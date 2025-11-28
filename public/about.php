<?php
// pages/about.php - Dynamic "About Us" page
// Place this file in your pages/ or public/ directory. It expects includes/header.php and includes/footer.php
// Behavior:
// - If $pdo (PDO database connection) exists it will attempt to load content from DB tables
// - Otherwise it will fall back to reading ../data/about.json (create this file using the sample structure shown below)
// - Images are expected in /assets/images/team/ and /assets/images/ (or change paths below)

// Sample JSON structure for fallback (save as ../data/about.json):
/*
{
  "organization": {
    "name": "SR College",
    "description": "SR College is a forward-thinking institution...",
    "founded": 1998,
    "location": "Chennai, India",
    "email": "info@example.com",
    "phone": "+91 12345 67890",
    "logo": "/assets/images/logo.png"
  },
  "mission": "To provide high-quality education...",
  "vision": "To be a centre of excellence...",
  "milestones": [
    {"year": 1998, "title": "Founded", "description": "College established..."},
    {"year": 2005, "title": "First Graduation", "description": "First batch graduated..."}
  ],
  "stats": {"students": 4200, "faculty": 120, "courses": 42, "years": 27},
  "team": [
    {"name": "Dr. A. Kumar", "role": "Principal", "bio": "Over 25 years...", "photo": "/assets/images/team/kumar.jpg", "linkedin": "#"}
  ],
  "testimonials": [
    {"text": "Great college!", "author": "Alumni 2018", "role": "Software Engineer"}
  ]
}
*/

require_once __DIR__ . '/../includes/header.php';

// Helper: load data either from DB or JSON
$data = [
    'organization' => [],
    'mission' => '',
    'vision' => '',
    'milestones' => [],
    'stats' => ['students'=>8000,'faculty'=>100,'courses'=>25,'years'=>20],
    'team' => [],
    'testimonials' => [],
];

if (isset($pdo) && $pdo instanceof \PDO) {
    try {
        // Prefer small, safe queries. You can adapt table/column names to your schema.
        // 1) org info (single-row table `about_info` with `key`,`value` or `name`,`value`)
        $stmt = $pdo->query("SELECT `key`,`value` FROM about_info");
        $rows = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
        if ($rows) {
            $data['organization'] = [
                'name' => $rows['org_name'] ?? ($rows['name'] ?? 'Our Organization'),
                'description' => $rows['description'] ?? '',
                'founded' => isset($rows['founded']) ? (int)$rows['founded'] : null,
                'location' => $rows['location'] ?? '',
                'email' => $rows['email'] ?? '',
                'phone' => $rows['phone'] ?? '',
                'logo' => $rows['logo'] ?? '/assets/images/logo.png'
            ];
            $data['mission'] = $rows['mission'] ?? '';
            $data['vision'] = $rows['vision'] ?? '';
        }

        // 2) milestones
        $stmt = $pdo->query("SELECT year,title,description FROM about_milestones ORDER BY year ASC LIMIT 50");
        $data['milestones'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 3) stats
        $stmt = $pdo->query("SELECT stat_key,stat_value FROM about_stats");
        $stats = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
        $data['stats'] = array_merge($data['stats'], [
            'students' => (int)($stats['students'] ?? $data['stats']['students']),
            'faculty' => (int)($stats['faculty'] ?? $data['stats']['faculty']),
            'courses' => (int)($stats['courses'] ?? $data['stats']['courses']),
            'years' => (int)($stats['years'] ?? $data['stats']['years'])
        ]);

        // 4) team
        $stmt = $pdo->query("SELECT name,role,bio,photo,linkedin FROM about_team ORDER BY display_order ASC LIMIT 50");
        $data['team'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 5) testimonials
        $stmt = $pdo->query("SELECT text,author,role FROM about_testimonials ORDER BY id DESC LIMIT 10");
        $data['testimonials'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        // On any DB error fall back to JSON
        error_log('About page DB error: ' . $e->getMessage());
    }
}

// If organization.name is empty, attempt JSON fallback
if (empty($data['organization']['name'])) {
    $jsonFile = __DIR__ . '/../data/about.json';
    if (file_exists($jsonFile)) {
        $json = file_get_contents($jsonFile);
        $parsed = json_decode($json, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $data = array_replace_recursive($data, $parsed);
        }
    }
}

// Set sane defaults
$org = $data['organization'];
$orgName = $org['name'] ?? 'Our Organization';
$orgDesc = $org['description'] ?? 'We are committed to excellence.';
$mission = $data['mission'] ?? '';
$vision = $data['vision'] ?? '';
$milestones = $data['milestones'] ?? [];
$stats = $data['stats'] ?? [];
$team = $data['team'] ?? [];
$testimonials = $data['testimonials'] ?? [];

?>

<main class="about-page container" style="max-width:1100px;margin:2rem auto;padding:0 1rem;">
    <header class="hero" style="display:flex;gap:1.5rem;align-items:center;flex-wrap:wrap;">
        <div style="flex:1;min-width:260px;">
            <h1>About <?php echo htmlspecialchars($orgName); ?></h1>
            <p class="lead" style="font-size:1.05rem;color:#333;line-height:1.6;"><?php echo htmlspecialchars($orgDesc); ?></p>
<p style="margin-top:0.5rem;color:#444;line-height:1.6;">Ragavi College is committed to fostering academic excellence, innovation, and holistic development. With state-of-the-art facilities, experienced faculty, and a student-centric learning environment, the institution empowers learners to become leaders in their fields while promoting values, discipline, and lifelong learning.</p>
            <?php if ($mission): ?>
                <h3>Our Mission</h3>
                <p><?php echo nl2br(htmlspecialchars($mission)); ?></p>
            <?php endif; ?>
            <?php if ($vision): ?>
                <h3>Our Vision</h3>
                <p><?php echo nl2br(htmlspecialchars($vision)); ?></p>
            <?php endif; ?>

            <p style="margin-top:1rem;"><a href="/contact.php" class="btn" style="transition:all .3s ease;transform:translateY(0);display:inline-block;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">Contact Us</a></p>
        </div>
        <div style="width:260px;text-align:center">
            <img src="<?php echo htmlspecialchars($org['logo'] ?? '/college_website/includes/RC.jpg'); ?>" alt="<?php echo htmlspecialchars($orgName); ?> logo" style="max-width:100%;border-radius:8px;box-shadow:0 6px 18px rgba(0,0,0,0.08);">
            <p style="font-size:.9rem;margin-top:.5rem;color:#555;"><strong><?php echo htmlspecialchars($org['location'] ?? ''); ?></strong></p>
        </div>
    </header>

    <section aria-labelledby="stats-heading" style="margin-top:2rem;">
        <h2 id="stats-heading">By the numbers</h2>
        <div class="stats-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1rem;margin-top:1rem;">
            <div class="stat card" style="padding:1rem;border-radius:8px;background:#fff;box-shadow:0 4px 10px rgba(0,0,0,0.03);text-align:center;">
                <div class="stat-number" data-target="<?php echo (int)($stats['students'] ?? 0); ?>">8000+</div>
                <div class="stat-label">Students</div>
            </div>
            <div class="stat card" style="padding:1rem;border-radius:8px;background:#fff;box-shadow:0 4px 10px rgba(0,0,0,0.03);text-align:center;">
                <div class="stat-number" data-target="<?php echo (int)($stats['faculty'] ?? 0); ?>">100+</div>
                <div class="stat-label">Faculty</div>
            </div>
            <div class="stat card" style="padding:1rem;border-radius:8px;background:#fff;box-shadow:0 4px 10px rgba(0,0,0,0.03);text-align:center;">
                <div class="stat-number" data-target="<?php echo (int)($stats['courses'] ?? 0); ?>">25+</div>
                <div class="stat-label">Courses</div>
            </div>
            <div class="stat card" style="padding:1rem;border-radius:8px;background:#fff;box-shadow:0 4px 10px rgba(0,0,0,0.03);text-align:center;">
                <div class="stat-number" data-target="<?php echo (int)($stats['years'] ?? 0); ?>">20+</div>
                <div class="stat-label">Years of Service</div>
            </div>
        </div>
    </section>

    <?php if (!empty($milestones)): ?>
    <section aria-labelledby="history-heading" style="margin-top:2.2rem;">
        <h2 id="history-heading">Our journey</h2>
        <ol class="timeline" style="margin-top:1rem;padding-left:1rem;">
            <?php foreach ($milestones as $m): ?>
                <li style="margin-bottom:1rem;">
                    <strong><?php echo htmlspecialchars($m['year'] ?? $m['date'] ?? ''); ?> - <?php echo htmlspecialchars($m['title'] ?? ''); ?></strong>
                    <p style="margin:0.35rem 0;color:#444"><?php echo htmlspecialchars($m['description'] ?? ''); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </section>
    <?php endif; ?>

    <?php if (!empty($team)): ?>
    <section aria-labelledby="team-heading" style="margin-top:2.2rem;">
        <h2 id="team-heading">Our team</h2>
        <div class="team-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem;margin-top:1rem;">
            <?php foreach ($team as $member): ?>
                <article class="team-member" style="padding:1rem;border-radius:8px;background:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.04);">
                    <div style="display:flex;gap:.8rem;align-items:center;">
                        <img src="<?php echo htmlspecialchars($member['photo'] ?? '/assets/images/team/placeholder.png'); ?>" alt="<?php echo htmlspecialchars($member['name'] ?? ''); ?>" style="width:72px;height:72px;object-fit:cover;border-radius:8px;">
                        <div>
                            <h3 style="margin:0;font-size:1rem"><?php echo htmlspecialchars($member['name'] ?? ''); ?></h3>
                            <div style="font-size:.9rem;color:#666"><?php echo htmlspecialchars($member['role'] ?? ''); ?></div>
                        </div>
                    </div>
                    <?php if (!empty($member['bio'])): ?>
                        <p style="margin-top:.6rem;color:#444;font-size:.95rem"><?php echo htmlspecialchars($member['bio']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($member['linkedin'])): ?>
                        <p style="margin-top:.6rem;"><a href="<?php echo htmlspecialchars($member['linkedin']); ?>" target="_blank" rel="noopener">LinkedIn</a></p>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($testimonials)): ?>
    <section aria-labelledby="testi-heading" style="margin-top:2.2rem;">
        <h2 id="testi-heading">What alumni say</h2>
        <div class="testimonials" style="margin-top:1rem;">
            <?php foreach ($testimonials as $t): ?>
                <blockquote style="background:#fff;padding:1rem;border-radius:8px;margin-bottom:.8rem;box-shadow:0 4px 10px rgba(0,0,0,0.03);">
                    <p style="margin:0 0 .5rem 0;">
                        “<?php echo htmlspecialchars($t['text'] ?? ''); ?>”
                    </p>
                    <footer style="font-size:.9rem;color:#666;">— <?php echo htmlspecialchars($t['author'] ?? ''); ?><?php if (!empty($t['role'])) echo ', ' . htmlspecialchars($t['role']); ?></footer>
                </blockquote>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section style="margin-top:2.2rem;padding:1.2rem;border-radius:8px;background:linear-gradient(90deg,#f7fbff,#ffffff);box-shadow:0 6px 22px rgba(0,0,0,0.03);display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;">
        <div>
            <h3 style="margin:.1rem 0;">Join our community</h3>
            <p style="margin:.2rem 0;color:#444;">If you want to collaborate, teach, or study with us — we'd love to hear from you.</p>
        </div>
        <div style="min-width:220px;text-align:right;">
            <a class="btn" href="/admissions.php" style="display:inline-block;padding:.6rem .9rem;border-radius:6px;background:#0b6efd;color:#fff;text-decoration:none;transition:all .3s ease;transform:translateY(0);" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'""display:inline-block;padding:.6rem .9rem;border-radius:6px;background:#0b6efd;color:#fff;text-decoration:none;">Admissions</a>
            <a class="btn" href="/contact.php" style="display:inline-block;padding:.6rem .9rem;border-radius:6px;margin-left:.6rem;background:#6c757d;color:#fff;text-decoration:none;transition:all .3s ease;transform:translateY(0);" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'" style="display:inline-block;padding:.6rem .9rem;border-radius:6px;margin-left:.6rem;background:#6c757d;color:#fff;text-decoration:none;">Contact</a>
        </div>
    </section>

<style>
/* Gradient Buttons + Press Effect */
.btn{
  border:none;
  background:linear-gradient(45deg,#4a6cf7,#6f9cf7);
  color:#fff !important;
  padding:.6rem .95rem;
  border-radius:8px;
  cursor:pointer;
  transition:all .25s ease;
  box-shadow:0 4px 12px rgba(0,0,0,.15);
  transform:translateY(0);
}
.btn:hover{
  background:linear-gradient(45deg,#6f9cf7,#4a6cf7);
  box-shadow:0 8px 22px rgba(0,0,0,.2);
  transform:translateY(-3px);
}
.btn:active{
  transform:scale(.96);
  box-shadow:0 2px 6px rgba(0,0,0,.2);
}

.btn{border:2px solid #0b6efd;}
.btn:hover{background:#fff !important;color:#0b6efd !important;border-color:#0b6efd !important;box-shadow:0 8px 20px rgba(0,0,0,0.1) !important;transform:translateY(-3px) !important;}
</style>
</main>

<script>
// Lightweight counter animation (no dependency)
document.addEventListener('DOMContentLoaded', function(){
    const observers = [];
    function animateCounter(el, target) {
        let start = 0;
        const duration = 1400;
        const stepTime = Math.max(16, Math.floor(duration / Math.abs(target - start || 1)));
        const startTime = performance.now();
        function step(now) {
            const progress = Math.min(1, (now - startTime) / duration);
            const value = Math.floor(progress * (target - start) + start);
            el.textContent = value.toLocaleString();
            if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    const statEls = document.querySelectorAll('.stat-number');
    const io = new IntersectionObserver((entries, observer)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target') || '0', 10);
                if(!el.classList.contains('done')){
                    animateCounter(el, target);
                    el.classList.add('done');
                }
                observer.unobserve(el);
            }
        });
    }, {threshold:0.3});
    statEls.forEach(el=> io.observe(el));
});
</script>

<!-- Structured data for SEO: Organization -->
<script type="application/ld+json">
<?php
$ld = [
    "@context" => "https://schema.org",
    "@type" => "EducationalOrganization",
    "name" => $orgName,
    "description" => mb_substr($orgDesc,0,250),
    "url" => (isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:'https') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? ''),
    "logo" => $org['logo'] ?? '/college_website/include/RC.jpg',
    "address" => ["@type" => "PostalAddress","addressLocality" => $org['location'] ?? '']
];
echo json_encode($ld, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
?>
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
