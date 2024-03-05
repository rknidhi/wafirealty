@include('front-layout.header')

    <section class="space-ptb">
        <div class="container">
            <div class="row">
            @include('event.layout.alert')
                <div class="col-12">
                    <div class="section-para d-flex">

                        <p>By listing your property with Wafi Realty India, you open up avenues to showcase your
                            property to a broader audience,
                            making it more convenient for you to find potential tenants or buyers. Registering with us
                            not only expands your reach
                            but also connects you with a reliable and targeted clientele genuinely interested in
                            purchasing or renting your
                            property.</p>
                    </div>




                </div>
                <div class="col-8">
                    <div class="section-title d-flex align-items-center">
                        <h2>List Your Property </h2>

                    </div>
                    <div class="form-box">
                        <form method="post" action="/createownlist">
                            @csrf
                            <input type="hidden" name="status" value="create">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Name</label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Email</label>
                                    <input type="text" name="email" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Mobile Number</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="mb-2">Property Location</label>
                                    <input type="text" name="location" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-12 mb-3 select-border">
                                    <label class="mb-2">Property Type</label>
                                    <select class="form-control basic-select" name="type">
                                        <option value="Commercial" selected="selected">Commercial</option>
                                        <option value="Residential">Residential</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label class="mb-2">Message</label>
                                    <textarea class="form-control" name="msg" rows="4" value=""></textarea>
                                </div>
                                <div class="add-listing d-none d-sm-block">
                                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <!--=================================
    footer-->
@include('front-layout.footer')