<?php
// Fully Dynamic Enhanced Homepage for Ragavi College
require_once __DIR__ . '/../includes/header.php';

// Fetch Stats, Features, and News (DB fallback handled gracefully)
$stats = [];
$features = [];
$news = [];
$about = [];

// Fetch dynamic content from DB
try {
    if (isset($pdo)) {
        // Stats
        $stats = $pdo->query("SELECT label, value FROM site_stats ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

        // Features
        $features = $pdo->query("SELECT icon, title, description FROM features ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

        // About Ragavi College
        $stmtAbout = $pdo->prepare("SELECT title, content FROM about_page LIMIT 1");
        $stmtAbout->execute();
        $about = $stmtAbout->fetch(PDO::FETCH_ASSOC);

        // Latest News
        $stmt = $pdo->prepare("SELECT n.id, n.title, n.content, n.created_at, u.name AS author 
                               FROM news n 
                               LEFT JOIN users u ON n.created_by = u.id 
                               ORDER BY n.id DESC LIMIT 5");
        $stmt->execute();
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    // Fail silently, default arrays below
}

// Default fallback content
if (empty($stats)) {
    $stats = [
        ["value" => "5000+", "label" => "Students Enrolled"],
        ["value" => "250+", "label" => "Expert Faculty"],
        ["value" => "50+",  "label" => "Courses Offered"],
        ["value" => "95%",  "label" => "Placement Rate"]
    ];
}

if (empty($features)) {
    $features = [
        ["icon" => "🎓", "title" => "Academic Excellence", "text" => "Rigorous curriculum designed to meet industry standards."],
        ["icon" => "🔬", "title" => "Modern Facilities", "text" => "Cutting-edge laboratories, library, and technology infrastructure."],
        ["icon" => "🌟", "title" => "Holistic Development", "text" => "Sports, cultural activities, and clubs that nurture well-rounded personalities."],
        ["icon" => "💼", "title" => "Career Support", "text" => "Dedicated placement cell with strong industry connections."],
    ];
}

if (empty($about)) {
    $about = [
        "title" => "About Ragavi College",
        "content" => "Ragavi College is a premier institution committed to excellence in education. Our mission is to empower students with knowledge, skills, and values that prepare them to succeed in a globalized world. With a focus on academic rigor, innovation, and holistic development, Ragavi College nurtures the leaders of tomorrow."
    ];
}
?>

<!-- Hero Section -->
<section class="hero-section" style="background:linear-gradient(120deg,#4a6cf7,#6f9cf7);color:#fff;padding:6rem 0;text-align:center;">
  <div class="container">
    <h1 class="hero-title" style="font-size:3rem;font-weight:700;margin-bottom:1rem;animation:fadeInUp 1s ease forwards;">Welcome to Ragavi College</h1>
    <p class="hero-subtitle" style="font-size:1.25rem;margin-bottom:2rem;animation:fadeInUp 1.2s ease forwards;">Empowering Minds, Shaping Futures - Excellence in Education Since 1995</p>

    <div class="hero-buttons" style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;">
      <a href="admissions.php" class="btn">Apply Now</a>
      <a href="academics.php" class="btn btn-secondary">Explore Programs</a>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="stats-section" style="padding:4rem 0;background:#f9f9f9;">
  <div class="container">
    <div class="stats-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem;">
      <?php foreach ($stats as $s): ?>
        <div class="stat-card" style="padding:1.5rem;background:#fff;border-radius:10px;box-shadow:0 6px 20px rgba(0,0,0,0.05);text-align:center;transition:all .3s ease;">
          <div class="stat-number" data-target="<?= htmlspecialchars($s['value']) ?>">0</div>
          <div class="stat-label" style="margin-top:.5rem;font-weight:500;color:#555;"><?= htmlspecialchars($s['label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about-section" style="padding:4rem 0;">
  <div class="container">
    <div class="section-header" style="text-align:center;margin-bottom:2rem;">
      <h2 style="font-size:2rem;animation:fadeInUp 1s ease;"><?= htmlspecialchars($about['title']) ?></h2>
      <div class="divider" style="width:80px;height:3px;background:#0b6efd;margin:1rem auto;border-radius:2px;"></div>
    </div>

    <p class="lead-text" style="max-width:800px;margin:0 auto 3rem;text-align:center;font-size:1.1rem;color:#444;animation:fadeInUp 1.2s ease;">
      <?= htmlspecialchars($about['content']) ?>
    </p>

    <div class="features-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.5rem;">
      <?php foreach ($features as $f): ?>
        <div class="feature-item" style="padding:1.5rem;background:#fff;border-radius:12px;box-shadow:0 6px 18px rgba(0,0,0,0.05);transition:all .3s ease;opacity:0;transform:translateY(30px);" data-animate>
          <div class="feature-icon" style="font-size:2rem;margin-bottom:1rem;"><?= htmlspecialchars($f['icon']) ?></div>
          <h3 style="margin-bottom:.5rem;font-size:1.2rem;font-weight:600;"><?= htmlspecialchars($f['title']) ?></h3>
          <p style="color:#555;"><?= htmlspecialchars($f['text']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
// Fully Dynamic Enhanced Homepage for Ragavi College
require_once __DIR__ . '/../includes/header.php';

// Fetch Stats, Features, and News (DB fallback handled gracefully)
$stats = [];
$features = [];
$news = [];
$about = [];

// Fetch dynamic content from DB
try {
    if (isset($pdo)) {
        // Stats
        $stats = $pdo->query("SELECT label, value FROM site_stats ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

        // Features
        $features = $pdo->query("SELECT icon, title, description FROM features ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

        // About Ragavi College
        $stmtAbout = $pdo->prepare("SELECT title, content FROM about_page LIMIT 1");
        $stmtAbout->execute();
        $about = $stmtAbout->fetch(PDO::FETCH_ASSOC);

        // Latest News / Events
        $stmt = $pdo->prepare("SELECT n.id, n.title, n.content, n.created_at AS date, u.name AS author 
                               FROM news n 
                               LEFT JOIN users u ON n.created_by = u.id 
                               ORDER BY n.id DESC LIMIT 10");
        $stmt->execute();
        $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    // Fail silently
}

if (empty($stats)) {
    $stats = [
        ["value" => "5000+", "label" => "Students Enrolled"],
        ["value" => "250+", "label" => "Expert Faculty"],
        ["value" => "50+",  "label" => "Courses Offered"],
        ["value" => "95%",  "label" => "Placement Rate"]
    ];
}

if (empty($features)) {
    $features = [
        ["icon" => "🎓", "title" => "Academic Excellence", "text" => "Rigorous curriculum designed to meet industry standards."],
        ["icon" => "🔬", "title" => "Modern Facilities", "text" => "Cutting-edge laboratories, library, and technology infrastructure."],
        ["icon" => "🌟", "title" => "Holistic Development", "text" => "Sports, cultural activities, and clubs that nurture well-rounded personalities."],
        ["icon" => "💼", "title" => "Career Support", "text" => "Dedicated placement cell with strong industry connections."],
    ];
}

if (empty($about)) {
    $about = [
        "title" => "About Ragavi College",
        "content" => "Ragavi College is a premier institution committed to excellence in education. Our mission is to empower students with knowledge, skills, and values that prepare them to succeed in a globalized world. With a focus on academic rigor, innovation, and holistic development, Ragavi College nurtures the leaders of tomorrow."
    ];
}
?>

<!-- --- (other sections above remain unchanged) --- -->

<!-- Events / Achievements Section (rewritten) -->
<section class="events-section" style="padding:4rem 0 2rem 0;">
  <div class="container" style="max-width:1200px;margin:0 auto;position:relative;">
    <div class="section-header" style="text-align:center;margin-bottom:2rem;">
      <h2 style="font-size:2rem;margin:0 0 .5rem;">Students Achievements</h2>
      <div class="divider" style="width:80px;height:3px;background:#0b6efd;margin:1rem auto;border-radius:2px;"></div>
    </div>

    <div class="events-carousel-wrapper">
      <!-- Left Arrow -->
      <button class="carousel-arrow carousel-left" aria-label="Scroll Left">
        <!-- simple svg arrow -->
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
          <path d="M15 6l-6 6 6 6" stroke="#f36b12" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>

      <!-- Carousel Track -->
      <div class="events-carousel" tabindex="0" aria-label="Student achievements carousel">
        <?php
        // Ensure at least 5 cards in fallback
        if (empty($news)) {
            $news = [
                ["date" => "2025-10-15", "title" => "Second place in the Inter-collegiate Volleyball tournament", "label" => "Students Achievement"],
                ["date" => "2025-10-15", "title" => "Second place in the Inter-collegiate Volleyball tournament", "label" => "Students Achievement"],
                ["date" => "2025-10-05", "title" => "Gold Medal at DSO Taekwondo", "label" => "Students Achievement"],
                ["date" => "2025-09-20", "title" => "State level Chess semi-finalist", "label" => "Students Achievement"],
                ["date" => "2025-08-03", "title" => "Inter-college Coding contest runner-up", "label" => "Students Achievement"],
            ];
        } else {
            // If fewer than 5 results from DB, duplicate until 5 to maintain visual effect
            $count = count($news);
            $i = 0;
            while ($count < 5) {
                $news[] = $news[$i % max(1, count($news))];
                $i++; $count++;
            }
        }

        foreach ($news as $e):
          // support both 'created_at' or 'date' keys
          $rawDate = isset($e['date']) ? $e['date'] : (isset($e['created_at']) ? $e['created_at'] : date('Y-m-d'));
          $day = date("d", strtotime($rawDate));
          $month = date("M y", strtotime($rawDate));
          $label = isset($e['label']) ? $e['label'] : (isset($e['author']) ? $e['author'] : 'Students Achievement');
          $title = isset($e['title']) ? $e['title'] : (isset($e['content']) ? $e['content'] : 'Achievement');
        ?>
          <article class="event-card" role="article">
            <div class="date-badge">
              <div class="date-day"><?= htmlspecialchars($day) ?></div>
              <div class="date-month"><?= htmlspecialchars($month) ?></div>
            </div>

            <div class="card-label"><?= htmlspecialchars($label) ?></div>

            <div class="card-body">
              <p class="card-title"><?= htmlspecialchars($title) ?></p>
            </div>

            <div class="card-arrow" aria-hidden>
              <svg width="28" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12h14M13 5l6 7-6 7" stroke="#f36b12" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>

            <div class="card-bottom-shadow" aria-hidden></div>
          </article>
        <?php endforeach; ?>
      </div>

      <!-- Right Arrow -->
      <button class="carousel-arrow carousel-right" aria-label="Scroll Right">
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
          <path d="M9 6l6 6-6 6" stroke="#f36b12" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
    </div>
  </div>
</section>

<style>
/* basic container */
.container{padding:0 20px;}

/* Carousel wrapper (positioning arrows outside) */
.events-carousel-wrapper{position:relative;padding:1rem 0;}

/* Arrows */
.carousel-arrow{
  position:absolute;
  top:50%;
  transform:translateY(-50%);
  width:46px;height:46px;
  border-radius:50%;
  background:transparent;
  border:none;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  z-index:5;
  transition:transform .18s ease;
  box-shadow:none;
}
.carousel-arrow:hover{transform:translateY(-50%) scale(1.06);}
.carousel-left{left:-28px;}
.carousel-right{right:-28px;}

/* Carousel track */
.events-carousel{
  display:flex;
  gap:28px;
  overflow-x:auto;
  scroll-snap-type:x mandatory;
  -webkit-overflow-scrolling:touch;
  padding:14px 6px;
  align-items:flex-start;
  scroll-behavior:smooth;
}

/* Hide default scrollbar */
.events-carousel::-webkit-scrollbar{height:10px;display:none;}
.events-carousel{scrollbar-width:none;-ms-overflow-style:none;}

/* Event card layout */
.event-card{
  position:relative;
  flex:0 0 36%;            /* 36% of container to show ~3 cards (adjusts with container) */
  max-width:420px;
  min-width:320px;
  background:#ffffff;
  border-radius:4px;
  padding:36px 28px 40px;
  box-sizing:border-box;
  scroll-snap-align:center;
  overflow:hidden;
  /* crisp main shadow */
  box-shadow: 0 6px 10px rgba(0,0,0,0.04);
  transition:transform .28s cubic-bezier(.2,.9,.2,1), box-shadow .28s ease;
  margin-bottom:40px;
}

/* subtle offset bottom shadow (like the image) */
.event-card .card-bottom-shadow{
  position:absolute;
  left:18px;
  right:18px;
  bottom:-14px;
  height:12px;
  background:rgba(0,0,0,0.06);
  transform:skewX(-10deg);
  border-radius:2px;
  filter:blur(6px);
  z-index:-1;
}

/* Hover lift */
.event-card:hover{ transform:translateY(-6px); box-shadow:0 14px 28px rgba(0,0,0,0.06); }

/* date badge top-left */
.date-badge{
  position:absolute;
  top:12px;
  left:12px;
  background:#f3f1ec;
  padding:12px 10px;
  border-radius:3px;
  text-align:center;
  width:66px;
  box-sizing:border-box;
}
.date-day{font-weight:700;font-size:20px;line-height:1;}
.date-month{font-size:12px;color:#222;opacity:.8;margin-top:6px;}

/* label top-right (blue, stacked lines like image) */
.card-label{
  position:absolute;
  top:12px;
  right:14px;
  color:#0b66b7;
  font-weight:600;
  text-align:right;
  line-height:1.05;
  font-size:14px;
  width:90px;
}

/* card body text */
.card-body{margin-top:10px;padding-right:20px;}
.card-title{
  margin:48px 0 0;
  font-size:1.15rem;
  color:#111;
  line-height:1.6;
  font-weight:500;
  letter-spacing:0.1px;
}

/* right arrow inside card */
.card-arrow{
  position:absolute;
  right:20px;
  bottom:22px;
  display:flex;
  align-items:center;
}

/* Responsive adjustments */
@media (min-width:1280px){
  .event-card{flex:0 0 30%; max-width:360px; min-width:320px;}
}
@media (max-width:900px){
  .event-card{flex:0 0 72%; max-width:520px; min-width:300px;}
  .carousel-left{left:6px;}
  .carousel-right{right:6px;}
  .container{padding:0 12px;}
}

/* accessibility focus */
.events-carousel:focus{outline:none;}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const track = document.querySelector('.events-carousel');
  const btnLeft = document.querySelector('.carousel-left');
  const btnRight = document.querySelector('.carousel-right');

  // how much to scroll: roughly the width of a card + gap
  function getScrollAmount(){
    const card = document.querySelector('.event-card');
    if(!card) return 300;
    const style = window.getComputedStyle(track);
    const gap = parseInt(style.columnGap || style.gap) || 28;
    return Math.round(card.getBoundingClientRect().width + gap);
  }

  btnLeft.addEventListener('click', ()=>{
    track.scrollBy({left: -getScrollAmount(), behavior:'smooth'});
  });
  btnRight.addEventListener('click', ()=>{
    track.scrollBy({left: getScrollAmount(), behavior:'smooth'});
  });

  // allow dragging to scroll (desktop)
  let isDown = false, startX, scrollLeft;
  track.addEventListener('mousedown', (e)=>{
    isDown = true;
    track.classList.add('dragging');
    startX = e.pageX - track.offsetLeft;
    scrollLeft = track.scrollLeft;
  });
  window.addEventListener('mouseup', ()=>{ isDown=false; track.classList.remove('dragging'); });
  track.addEventListener('mouseleave', ()=>{ isDown=false; track.classList.remove('dragging'); });
  track.addEventListener('mousemove', (e)=>{
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - track.offsetLeft;
    const walk = (x - startX) * 1; //scroll-fast
    track.scrollLeft = scrollLeft - walk;
  });

  // keyboard support: left/right arrow when carousel focused
  track.addEventListener('keydown',(e)=>{
    if(e.key === 'ArrowLeft'){ e.preventDefault(); track.scrollBy({left:-getScrollAmount(),behavior:'smooth'}); }
    if(e.key === 'ArrowRight'){ e.preventDefault(); track.scrollBy({left:getScrollAmount(),behavior:'smooth'}); }
  });
});
</script>

<!-- CTA Section -->
<section class="cta-section" style="padding:4rem 0;text-align:center;background:linear-gradient(120deg,#0b6efd,#4a6cf7);color:#fff;">
  <div class="container">
    <h2 style="font-size:2rem;margin-bottom:1rem;animation:fadeInUp 1s ease;">Ready to Begin Your Journey?</h2>
    <p style="font-size:1.1rem;margin-bottom:2rem;animation:fadeInUp 1.2s ease;">Join thousands of successful students who have transformed their lives at Ragavi College</p>
    <a href="admissions.php" class="btn btn-large">Apply for Admission</a>
  </div>
</section>

<style>
/* Gradient Buttons + Press Effects */
.btn{
  border:none;
  background:linear-gradient(45deg,#4a6cf7,#6f9cf7);
  color:#fff !important;
  padding:.7rem 1.2rem;
  border-radius:8px;
  cursor:pointer;
  transition:all .3s ease;
  box-shadow:0 6px 20px rgba(0,0,0,.1);
  transform:translateY(0);
  display:inline-block;
  text-decoration:none;
}
.btn:hover{
  background:linear-gradient(45deg,#6f9cf7,#4a6cf7);
  box-shadow:0 10px 28px rgba(0,0,0,.15);
  transform:translateY(-4px);
}
.btn:active{
  transform:scale(.96);
  box-shadow:0 4px 10px rgba(0,0,0,.2);
}

/* Secondary Button */
.btn-secondary{
  background:#fff;
  color:#0b6efd !important;
  border:2px solid #0b6efd;
}
.btn-secondary:hover{
  background:#0b6efd;
  color:#fff !important;
}

/* Fade In Up Animation */
@keyframes fadeInUp{
  0%{opacity:0;transform:translateY(30px);}
  100%{opacity:1;transform:translateY(0);}
}

/* Animate elements on scroll */
[data-animate]{
  opacity:0;
  transform:translateY(30px);
  transition:all .6s ease-out;
}
[data-animate].visible{
  opacity:1;
  transform:translateY(0);
}
</style>

<script>
// Counter animation & scroll reveal
document.addEventListener('DOMContentLoaded', function(){
    // Stats counter
    const statEls = document.querySelectorAll('.stat-number');
    const io = new IntersectionObserver((entries, observer)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                const el = entry.target;
                let target = parseInt(el.getAttribute('data-target').replace(/\D/g,'')) || 0;
                let start = 0;
                const duration = 1400;
                const stepTime = Math.max(16, duration/target);
                function step(){
                    start += Math.ceil(target/60);
                    if(start > target) start = target;
                    el.textContent = start.toLocaleString();
                    if(start < target) requestAnimationFrame(step);
                }
                step();
                observer.unobserve(el);
            }
        });
    },{threshold:0.3});
    statEls.forEach(el=>io.observe(el));

    // Animate features and news on scroll
    const animEls = document.querySelectorAll('[data-animate]');
    const io2 = new IntersectionObserver((entries, obs)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                entry.target.classList.add('visible');
                obs.unobserve(entry.target);
            }
        });
    },{threshold:0.2});
    animEls.forEach(el=>io2.observe(el));
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
