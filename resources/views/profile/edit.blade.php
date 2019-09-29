<!-- Profile Edit -->
<div class="modal fade" id="profile-edit" tabindex="-1" role="dialog" aria-labelledby="profile-edit-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-edit-title">Edit profile</h5>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name-edit">First name</label>
                            <input type="text" class="form-control" id="name-edit" placeholder="First name" required>
                        </div>
                        <div class="form-group col-12 col-md-6 pt-3 pt-md-0">
                            <label for="surname-edit">Surname</label>
                            <input type="text" class="form-control" id="surname-edit" placeholder="Surname" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="password-edit">New Password</label>
                            <input type="password" class="form-control" id="password-edit" placeholder="New Password" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password-edit_confirmation">Confirm new password</label>
                            <input type="password" class="form-control" id="password-edit_confirmation" placeholder="Confirm new password" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="phone-edit">Phone</label>
                            <input type="tel" class="form-control" id="phone-edit" placeholder="Phone">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="email-edit">Email</label>
                            <input type="email" class="form-control" id="email-edit" value="<?php echo auth()->user()->email; ?>" disabled required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="birthday-edit">Birthday</label>
                            <input type="date" class="form-control" id="birthday-edit" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <legend class="col-form-label pt-md-0 pt-3">Sex</legend>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="M" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline mt-md-2">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="F">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio-edit" rows="5" placeholder="Bio"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 d-flex">
                            <button type="submit" id="profile-update-button" class="btn btn-secondary mr-auto" data-id="{{ $user->id }}">Save <i class="fas fa-save ml-2"></i></button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fas fa-times ml-2"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Profile Edit End -->