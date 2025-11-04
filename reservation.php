<?php
session_start();
require_once 'parties/haeder.php';
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Réservation</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Réservation</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Reservation Section -->
  <section id="reservation" class="reservation section" style="
      background: url('assets/img/restaurant/dessert-5.webp') center/cover no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
  ">

    <!-- Couche semi-transparente -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1;
    "></div>

    <div class="container position-relative" style="z-index: 2;">
      <div class="row justify-content-center">
        <div class="col-lg-6">

          <div class="p-5 rounded-4 shadow-lg" style="
              backdrop-filter: blur(10px);
              background: rgba(255,255,255,0.2);
              border: 1px solid rgba(255,255,255,0.3);
              color: #fff;
          ">

            <h2 class="text-center mb-4 fw-bold"  style="color:#fff;">Réserver une table ou un événement</h2>

            <?php if (!isset($_SESSION['id_client'])): ?>
              <p class="text-center mb-4" style="color:#fff; font-weight:bold;">
                Veuillez vous connecter ou vous inscrire avant d'envoyer une réservation.
              </p>
              <div class="text-center">
                <a href="Inscription.php" class="btn btn-warning btn-lg">Connexion / Inscription</a>
              </div>
            <?php else: ?>

              <form action="actions/action_reservation.php" method="post" class="php-email-form">

                <div class="mb-3">
                  <label for="nom" class="form-label">Nom</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="exemple@gmail.com" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Téléphone</label>
                  <input type="tel" name="phone" id="phone" class="form-control" placeholder="+243 977 590 946" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>

                <div class="mb-3">
                  <label for="date" class="form-label">Date de réservation</label>
                  <input type="date" name="date" id="date" class="form-control" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>

                <div class="mb-3">
                    <label for="time">Reservation Time</label>
                    <input type="time" id="time" class="form-control" name="time" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                  </div>

                <div class="mb-3">
                  <label for="guest_count" class="form-label">Nombre de convives</label>
                  <select name="guest_count" id="guest_count" class="form-select" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                    <option style="color: #000000ff;" value="">Sélectionnez</option>
                    <option style="color: #000000ff;" value="15-30">15-30 invités</option>
                    <option style="color: #000000ff;" value="31-60">31-60 invités</option>
                    <option style="color: #000000ff;"  value="61-100">61-100 invités</option>
                    <option style="color: #000000ff;"  value="100+">100+ invités</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="event_type" class="form-label">Type d'événement</label>
                  <select name="event_type" id="event_type" class="form-select" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                    <option style="color: #000000ff;"value="">Sélectionnez</option>
                    <option style="color: #000000ff;" value="wedding">Mariage</option>
                    <option style="color: #000000ff;" value="corporate">Événement corporatif</option>
                    <option style="color: #000000ff;" value="birthday">Anniversaire</option>
                    <option style="color: #000000ff;" value="other">Autre</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea name="message" id="message" rows="4" class="form-control" placeholder="Détails supplémentaires..." required style="background: rgba(255,255,255,0.2); color:#fff; border:none;"></textarea>
                </div>

                <div class="d-grid">
                  <button type="submit" name="btn-submit" class="btn btn-info btn-lg text-white border-0">Confirmer la réservation</button>
                </div>

              </form>

            <?php endif; ?>

          </div>

        </div>
        <div class="col-lg-6">
                <!-- Carousel Section -->
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
              </div>

              <!-- Slides -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/img/restaurant/main-8.webp" class="d-block w-100" alt="Photo 1">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/restaurant/event-8.webp" class="d-block w-100" alt="Photo 2">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/restaurant/dessert-7.webp" class="d-block w-100" alt="Photo 3">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/restaurant/starter-6.webp" class="d-block w-100" alt="Photo 4">
                </div>
              </div>

              <!-- Controls -->
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
              </button>

            </div>
          <br>

            <section id="contact" class="contact section ">
    
      <div class="container">
        <div class="row ">
          <div class="col-lg-12 ">
            <div class="contact-info ">
              <div class="contact-card bg-info">
                <h3>Contact Information</h3>
                <p>Feel free to reach out with any questions about the book, speaking engagements, or media inquiries.</p>

                <div class="contact-details">
                  <div class="contact-item">
                    <i class="bi bi-envelope"></i>
                    <div>
                      <h4>Email:</h4>
                      <p>gracerukendo2@gmail.com</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <i class="bi bi-telephone"></i>
                    <div>
                      <h4>Phone:</h4>
                      <p>+243 891 638 231</p>
                    </div>
                  </div>

                  <div class="contact-item">
                    <i class="bi bi-geo-alt"></i>
                    <div>
                      <h4>Address:</h4>
                      <p>Province du Nord-Kivu</p>
                      <p>ville de Butembo, Av. Matokeo</p>
                      <p> N° 123</p>
                    </div>
                  </div>
                </div>

                <div class="social-links">
                  <a href="#"><i class="bi bi-twitter"></i></a>
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          
          
        </div>
      </div>
    </div>

  </section>

</main>
<!-- Assurez-vous d'avoir Bootstrap JS chargé -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php require_once 'parties/footer.php'; ?>
