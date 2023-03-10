<?php $this->load->view('template/header');?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row-8">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?=base_url('auth/signup');?>">
                            <div class="form-group">
                                    <input type="text" value="<?=set_value('name')?>" name="name" class="form-control form-control-user" id="name"
                                        placeholder="Name">
                                    <?=form_error('name','<small class="text-danger ml-2">','</small>')?>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?=set_value('username')?>" name="username" class="form-control form-control-user" id="username"
                                        placeholder="Username">
                                    <?=form_error('username','<small class="text-danger ml-2">','</small>')?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?=set_value('email')?>"
                                        placeholder="Email Address">
                                        <?=form_error('email','<small class="text-danger ml-2">','</small>')?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="pass1"
                                            id="pass1" placeholder="Password">
                                            <?=form_error('pass1','<small class="text-danger ml-2">','</small>')?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="pass2"
                                            id="pass2" placeholder="Repeat Password">
                                            <?=form_error('pass2','<small class="text-danger ml-2">','</small>')?>
                                    </div>
                            
                                </div>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            
                           
                            <div class="text-center">
                                <a class="small" href="<?=base_url('auth/login')?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $this->load->view('template/footer');?>