@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">New Unit</p>

<div class="card mb-4">
    <h5 class="card-header">Unit Details</h5>
    <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="unitName" class="form-label">Unit Name</label>
                    <input class="form-control" type="text" id="unitName" name="unitName" placeholder="Unit Name" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Unit Description</label>
                    <input class="form-control" type="text" id="email" name="email"
                        placeholder="Descriptiion..." />
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="course">Course</label>
                    <select id="course" class="select2 form-select">
                        <option value="">Select</option>
                        <option value="Australia">Australia</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Canada">Canada</option>
                        <option value="China">China</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Japan">Japan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Korea">Korea, Republic of</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Russia">Russian Federation</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Add Unit</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>

</div>

@endsection