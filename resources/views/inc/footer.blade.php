<!-- Footer -->
<footer class="page-footer font-small blue pt-4 bg-dark text-light">
  <div class="container">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase pb-2">Pretplati se</h5>
        <p>Želite među prvima da saznate o novim proizvodima i promocijma</p>

        <div class="row">
          <div class="col-md-10">
            <form class="form-inline" action="{{ route('subscribe')}}" method="POST">
                @csrf
                <input name="email" class="form-control mr-sm-2" type="email" placeholder="Vaša e-mail adresa" >
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pretplatite se</button> 
            </form>

          </div>

        </div>


      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase pb-2">Kontakt</h5>
        <ul class="list-unstyled">
          <li>
            <p>Bulevar Dobrog Zvuka 9, Beograd</p>
          </li>
          <li>
            <p>+381 60 123 4567</p>
          </li>
          <li>
            <p></p>
          </li>
          <li>
            <p>mr-music@mail.com</p>
          </li>
        </ul>

      </div>
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase pb-2">Zapratite nas</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!"> <p class="text-white">Facebook </p>
            </a>
          </li>
          <li>
            <a href="#!"> <p class="text-white">Tweeter</p>
            </a>
          </li>
          <li>
            <a href="#!"> <p class="text-white">Instagram</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3 border-top">© 2019 Copyright:
    <a href="https://www.linkedin.com/in/momir-radunkovi%C4%87-2154b2183/"> Momir Radunković</a>
  </div>
  </div>
</footer>
