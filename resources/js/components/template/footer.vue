<template>
    <footer>
        <div class="footer-box">
            <div class="footer-box-nav">
                <div class="footer-box-nav-menu">
                    <h5>Navigation</h5>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  text-light" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Commerçants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Favoris</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Contactez-nous</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-box-nav-category">
                    <h5>Catégories</h5>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Épicerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Boulangerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Fruits & légumes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Boucherie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Poissonnerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Fromagerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Vin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Marché de producteurs</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-box-newsletter">
                <h5>Abonnez-vous à la newsletter :</h5>
                <div class="input-group mb-3 signup-newsletter-form">
                    <input type="text" class="form-control" placeholder="Entrez votre adresse email"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="master-btn" type="button" id="button-addon2">Je m'abonnes</button>
                </div>
            </div>
            <div class="footer-box-info">
                <div class="footer-box-info-logo">
                    <div>
                        <img :src="this.previewImage+'logo.png'" alt="Logo Local Quest">
                        <p>Local quest est une application qui aide à la consommation locale et l'économie circulaire.</p>
                    </div>
                    <p><strong>Adresse :</strong> 68 bis rue Élise lucas 79510 Coulon</p>
                    <div class="footer-box-info-logo-social">
                        <h5>Suivez-nous :</h5>
                        <div class="footer-box-info-logo-social-icon">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-linkedin"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </footer>
</template>

<script>
export default {
data(){
    return{
        previewImage: "http://[::1]:5173/public/images/",
    }
}
}
</script>

<style lang="scss" scoped>

footer {
  display: flex;
  flex-direction: column;
}

.footer-box {
  background-color: #0F3B29;
  color: white;
  display: flex;
  gap: 3rem;
  padding: 2rem 5rem 2rem 5rem;
}

.footer-box-info {
  display: flex;
  width: 40%;
}

.footer-box-info-logo {
  display: flex;
  flex-direction: column;
  width: 80%;
}

.footer-box-info-logo img {
  padding-bottom: 2rem;
  width: 50%;
}

.footer-box-info-logo p {
  color: white;
  padding-bottom: 1rem;
  width: 90%;
}

.footer-box-info-logo-social {
  display: flex;
  gap: 1rem;
  padding-bottom: 2rem;
}

.footer-box-info-logo-social-icon {
  display: flex;
  font-size: 1.5rem;
  gap: 2rem;
}

.footer-box-newsletter {
  display: flex;
  flex-direction: column;
  width: 30%;
}

.footer-box-newsletter h5 {
  padding-bottom: 2rem;
}
.master-btn {
  transition: all 250ms;
  height: 4rem;
  padding: 1rem;
  border-radius: 8px;
  border: 1px solid #ff8528;
  background-color: #ff8528;
  color: white;
  text-decoration: none;
  font-size: .85rem;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  letter-spacing: 1.248px;
  text-transform: uppercase;
}

.master-btn:hover{
  border: 1px solid #ff8528;
  background-color: transparent;
  color: #ff8528;
}

.footer-box-nav {
  width: 30%;
  display: flex;
  justify-content: end;
  gap: 8rem;
}


</style>