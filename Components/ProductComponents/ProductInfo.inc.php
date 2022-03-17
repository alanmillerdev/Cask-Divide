<section class="py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Product Name</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Product Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus quidem corrupti quis voluptates! Dolor distinctio alias illo, delectus ducimus quibusdam labore corporis</p>
                    
                    <form>
                        <div class="form-group">
                        <label for="formControlRange" class="text-white">How much do you want to Invest?</label>
                        <input type="range" class="form-control-range" id="formControlRange" onInput="$('#rangevalue').html($(this).val())" style="
                        border-radius: 100px;">
                        </div>
                    </form>

                    <h1 class="display-6 fw-bolder text-white mb-4"><span class="text-white" id="rangevalue">50</span>% of the Cask: £592.67</h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#">Purchase <i class="fas fa-shopping-bag"></i></a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#">Learn about the Casks <i class="fas fa-arrow-alt-circle-down"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/cask1.png" alt="..."></div>
        </div>
    </div>
</section>