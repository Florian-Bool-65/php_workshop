<?php
$menuEntries = [
  [
    "text" => "Home",
    "link" => "/"
  ],
  [
    "text" => "Dipartimenti",
    "link" => "/dipartimenti.php"
  ],
  [
    "text" => "Corsi di Laurea",
    "link" => "/corsi_laurea.php"
  ],
  [
    "text"   => "Altro",
    "childs" => [
      [
        "text" => "Corsi",
        "link" => "/corsi.php"
      ],
      [
        "text" => "Esami",
        "link" => "/esami.php"
      ],
      [
        "text" => "Studenti",
        "link" => "/studenti.php"
      ],
      [
        "text" => "Insegnanti",
        "link" => "/insegnanti.php"
      ]
    ]
  ]
]
?>

<header class="position-sticky top-0">
  <nav class="navbar bg-light border-bottom navbar-expand-lg">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Php Workshop</span>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <?php
          foreach ($menuEntries as $entry) {
            if (key_exists("childs", $entry)) {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                  <?php echo $entry['text'] ?>
                </a>
                <ul class="dropdown-menu">
                  <?php
                  foreach ($entry['childs'] as $child) {
                    ?>
                    <li class="dropdown-item">
                      <a href="/php_workshop<?php echo $child['link'] ?>">
                        <?php echo $child['text'] ?>
                      </a>
                    </li>
                    <?php
                  }
                  
                  ?>
                </ul>
              </li>
              <?php
            } else {
              echo "<li class=\"nav-item\">";
              echo "<a class=\"nav-link\" href=\"/php_workshop{$entry['link']}\">{$entry['text']}</a>";
              echo "</li>";
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
