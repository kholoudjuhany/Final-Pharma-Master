<div class="site-section bg-light">
    <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">

              @foreach ($medicines as $medicine)
                <div class="text-center item mb-4">
                  <!-- Dynamically use the medicine image from the database -->
                  <img src="{{ asset('storage/' . $medicine->med_img) }}" alt="Image" style="height: 500px; object-fit: cover;">
                  <h3 class="text-dark" id="product-name">{{ $medicine->med_name }}</h3>
                  <p class="price">${{ $medicine->med_price }}</p>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
</div>
