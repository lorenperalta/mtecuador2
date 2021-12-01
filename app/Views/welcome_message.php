<?= $this->extend('Layout/Clientedash') ?>
<?= $this->section('contenido') ?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="css/registro1.jpg" class="d-block w-100" alt="" height="30%">
    </div>
    <div class="carousel-item">
      <img src="css/registro2.jpg" class="d-block w-100" alt="" height="30%">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
  <div class="row mx-auto ">
    <div class="col-sm">
      First in DOM, ordered last
      <div class="card" style="width: 18rem;">
        <img src="https://mail.blog.xmundo.net/wp-content/uploads/2012/06/thunderbird-200x200.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm">
      Second in DOM, unordered
      <div class="card" style="width: 18rem;">
        <img src="https://mail.blog.xmundo.net/wp-content/uploads/2012/06/thunderbird-200x200.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm">
      Third in DOM, ordered first
      <div class="card" style="width: 18rem;">
        <img src="https://mail.blog.xmundo.net/wp-content/uploads/2012/06/thunderbird-200x200.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>