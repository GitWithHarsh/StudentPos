<style>
    <style>.profileSec {

        padding-top: 50px;

    }

    .profileFormEmployee input {
        background: white;
    }

    .user-admin-profile-img {

        background: #cdcdcd26;
        padding: 20px 0px 30px 0px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: rgb(0 0 0 / 2%) 0px 1px 3px 0px, rgb(27 31 35 / 15%) 0px 0px 0px 1px;
    }

    .profileBtnEmp input {
        background: #cc6601 !important;
    }

    .form-group.imgprofile {

        margin-bottom: 1rem;

        width: 150px;

        height: 150px;

        border-radius: 50%;

        overflow: hidden;

        border: 4px solid #ebecec;

        margin: 0 auto;

    }

    .form-group.imgprofile img {

        width: 100%;

        object-fit: cover;

        height: 100%;

    }

    .user-detail-input-box {

        background: #cdcdcd26;

        padding: 20px 20px 30px 20px;

        box-shadow: rgb(0 0 0 / 2%) 0px 1px 3px 0px, rgb(27 31 35 / 15%) 0px 0px 0px 1px;

    }

    .profileFormEmployee label {

        font-weight: 600;

        margin-top: 10px;

        margin-bottom: 10px;

    }

    .profileBtnEmp input {

        margin-top: 20px;

        background: var(--skyBlue);

        border: unset;

        padding: 8px 30px;

        font-weight: 500;

        font-size: 17px;

        transition: 0.7s;

    }

    .profileBtnEmp {

        text-align: center;

    }

    .fileProfileEmployee {
        text-align: center;
    }

</style>

</style>

<div class="container-fluid position-relative d-flex p-0">

    @include('Sub_Admin.layout.header')

    <div class="container-fluid pt-4 px-4">

        <div class="row g-4">

            <div class="col-12">

                <form action="{{url('add_sub_admin')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <section class="profileSec">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-4">

                                    <div class="user-admin-profile-img">
                                        <div>
                                            <div class="form-group imgprofile">

                                                <?php if (isset($branchData)) { ?>

                                                <img id="oldImage"
                                                    src="{{asset('branch_image')}}/{{$branchData->branch_image}}"
                                                    class="center">

                                                <?php } ?>

                                            </div>

                                            <div class="form-group fileProfileEmployee">

                                                <input type="file" name="branch_name" onchange="changeImage()"
                                                    class="form-control-file" id="exampleFormControlFile1"
                                                    accept="image/*">

                                            </div>

                                            <span id="imggg" style="color: red;"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-8">

                                    <div class="user-detail-input-box">

                                        <div class="row profileFormEmployee">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Identifiant de la succursale </label>

                                                    <input type="text" readonly name="email" class="form-control "
                                                        id="exampleInputEmail1" placeholder="Entrez l'e-mail ici"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                                        echo $branchData->branch_id;

                                                                                                                                                                                    } ?>">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Nom de la filiale</label>

                                                    <input type="text" name="branchName" class="form-control "
                                                        id="exampleInputEmail1"
                                                        placeholder="Entrez le nom de la succursale"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                                                echo $branchData->branch_name;

                                                                                                                                                                                            } ?>">

                                                </div>

                                            </div>



                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Prénom</label>

                                                    <input type="text" name="firstName" class="form-control "
                                                        id="exampleInputEmail1" placeholder="entrez votre prénom"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                                    echo $branchData->first_name;

                                                                                                                                                                                } ?>">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Nom de famille</label>

                                                    <input type="text" name="lastName" class="form-control "
                                                        id="exampleInputEmail1" placeholder="Entrer le nom de famille"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                                        echo $branchData->last_name;

                                                                                                                                                                                    } ?>">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Genre</label>

                                                    <input type="text" name="gender" class="form-control "
                                                        id="exampleInputEmail1" placeholder=Entrez le sexe"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                            echo $branchData->gender;

                                                                                                                                                                        } ?>"
                                                        value="admin@admin">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>

                                                        Emplacement de la succursale</label>

                                                    <input type="text" name="location" class="form-control "
                                                        placeholder="

Entrez l'emplacement de la succursale" value="<?php if (isset($branchData)) {

                                                    echo $branchData->branch_location;

                                                } ?>">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>

                                                        Ville</label>

                                                    <input type="text" name="City" class="form-control " placeholder="

Entrez l'adresse ici" value="<?php if (isset($branchData)) {

                                    echo $branchData->city;

                                } ?>">



                                                    <input type="hidden" name="profileId" class="form-control "
                                                        placeholder="Enter address here"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                            echo $branchData->id;

                                                                                                                                                        } ?>">



                                                    <input type="hidden" name="branch_image" class="form-control "
                                                        placeholder="Enter address here"
                                                        value="<?php if (isset($branchData)) {

                                                                                                                                                                echo $branchData->branch_image;

                                                                                                                                                            } ?>">

                                                </div>

                                            </div>

                                        </div>

                                        <div class=" profileBtnEmp">

                                            <input type="submit" value="Update" class="btn btn-Success">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                </form>

            </div>

        </div>

    </div>

    <script type="text/javascript">

        function changeImage() {

            var oldImage = document.getElementById('oldImage');

            oldImage.src = URL.createObjectURL(event.target.files[0]);

        }

    </script>



    @include('Sub_Admin.layout.footer')