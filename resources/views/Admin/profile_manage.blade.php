<style>
    .main-panel.profilePage label {
        margin-bottom: 10px;
    }

    .main-panel.profilePage input {
        margin-bottom: 25px;
        color: #ffffffab;
    }

    .form-control:focus {
        color: white !important;
    }

    .profilePara {
        color: black !important;
        font-weight: 500;
    }

    .profileimg img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        border: 1px solid #00650096;
    }

    .profileimg {
        margin: auto;
        height: 200px;
        width: 200px !important;
    }
</style>

<body>
    <div class="container-scroller">
        @include('Admin.layout.header')
        <!-- partial -->
        <div class="main-panel profilePage">
            <div class="content-wrapper">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('Home')}}">
                                    Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gérer le profil</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mainDashHead">Profil Gérer</h3>
                                <p class="profilePara">Vos informations ont été mises à jour avec succès</p>
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <form class="forms-sample " id="profileManage" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Confirmez le mot de
                                                    passe</label>
                                                <input type="file" class="form-control" name="admin_image"
                                                    id="admin_image" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Nom de l'administrateur</label>
                                                <input type="text" name="Name" id="Name" class="form-control" value="<?php if (isset($profileManage)) {
                                                                                                                    echo $profileManage->name;
                                                                                                                } ?>"
                                                    placeholder="Admin Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                    E-mail de l'administrateur</label>
                                                <input type="email" name="Email" id="Email" class="form-control" value="<?php if (isset($profileManage)) {
                                                                                                                    echo $profileManage->email;
                                                                                                                } ?>"
                                                    placeholder="Email">
                                            </div>
                                            <input type="hidden" name="profileId" value="<?php if (isset($profileManage)) {
                                                                                        echo $profileManage->id;
                                                                                    } ?>">
                                            <input type="hidden" name="profile_image" value="<?php if (isset($profileManage)) {
                                                                                            echo $profileManage->image;
                                                                                        } ?>">
                                            <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" id="rememberBox" class="form-check-input">
                                                    Souviens-toi de moi </label>
                                            </div>
                                            <input type="hidden" id="checkBoxId" name="rememberBox">
                                            <div class="mt-4">
                                                <button type="button" onclick="submitAdminForm()"
                                                    class="btn btn-primary me-2">
                                                    Mise à jour</button>
                                                <button type="button" class="btn btn-dark"
                                                    onclick="window.location.href='{{url(" Home")}}'">
                                                    Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profileimg">
                                            <img src="{{asset('branch_image')}}/{{$profileManage->image}}"
                                                alt="Admin Image">
                                        </div>
                                    </div>
                                </div>
                                <!-- <p class="card-description"></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function submitAdminForm() {
                    let checkboc = document.querySelector('#rememberBox').checked;
                    document.getElementById('checkBoxId').value = checkboc;
                    let admin_image = document.getElementById('admin_image').value;
                    let Name = document.getElementById('Name').value;
                    let Email = document.getElementById('Email').value;
                    $.ajax({
                        type: "POST",
                        url: "{{url('profile_update')}}",
                        data: new FormData($('#profileManage')[0]),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            if ($.trim(data) == "done") {
                                document.getElementById('success').style.display = 'block';
                            }
                        }
                    });
                }
            </script>
            @include('Admin.layout.footer')