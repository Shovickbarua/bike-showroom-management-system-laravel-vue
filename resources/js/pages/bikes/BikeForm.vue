<script setup></script>

<template>
    <form id="myForm" method="POST" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">
                    Brand<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder="Name"
                    name="brand"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Model No<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="bike_name"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="dob">
                    Date<font class="text-danger">*</font>
                </label>
                <input
                    type="date"
                    class="form-control singledatepicker"
                    id="dob"
                    name="dob"
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Quantity<font class="text-danger">*</font>
                </label>
                <input
                    type="number"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="bquantity"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Cost Price<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="bcost"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Color<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="color"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Engine No<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="engine_no"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Chassis No<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="chas_no"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Make of Vehicle<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="m_veh"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Year of Manufacture
                    <font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="manu"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    No of Cylinder with CC
                    <font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="cc"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Seating Capacity<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="seat_cap"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Brake<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="brake"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Front Tyre Size<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="ftyre"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Rear Tyre Size<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="rtyre"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Weight<font class="text-danger">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id=""
                    placeholder=""
                    name="weight"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="image">Image Upload</label>
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                />
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary btn-sm">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>
