<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Register Now</h2>
            </div>
            
            <div class="col-md-12">
                <form action="#" method="post">
                    <div class="p-3 p-lg-5 border">
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="dob" class="text-black">Date of Birth <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required max="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="text-black">Gender <span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="gender_male" name="gender" value="Male" required>
                                        <label class="form-check-label" for="gender_male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="gender_female" name="gender" value="Female" required>
                                        <label class="form-check-label" for="gender_female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="personal_id" class="text-black">Personal ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="personal_id" name="personal_id" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="text-black">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="confirm_password" class="text-black">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="hic" class="text-black">Health Insurance Company <span class="text-danger">*</span></label>
                                <select class="form-control" id="hic" name="hic" required>
                                    <option value="" disabled selected>Select Health Insurance Company</option>
                                    <option value="HIC_1">ASEZA (المفوضية)</option>
                                    <option value="HIC_2">JPMC (شركة مناجم الفوسفات)</option>
                                    <option value="HIC_3">Arab Potash Company (شركة البوتاس العربية)</option>
                                    <option value="HIC_3">Nat Health Company (شركة نات هيلث)</option>
                                    <option value="HIC_4">GIG (شركة الشرق العربي للتأمين)</option>
                                    <option value="HIC_5">Med Service (شركة ميد سيرفس)</option>
                                    <option value="HIC_6">Al-Nisr Al-Arabi Insurance (شركة النسر العربي)</option>
                                    <option value="HIC_7">ACT (شركة ميناء حاويات العقبة)</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
