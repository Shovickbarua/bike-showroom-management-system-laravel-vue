<script setup></script>

<template>
    <form id="myForm" method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">
                    Expense Name<font style="color: red">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Expense"
                    name="ex_name"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="name">
                    Amount<font style="color: red">*</font>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder=""
                    name="amount"
                    value=""
                />
            </div>
            <div class="form-group col-md-4">
                <label for="dob"> Date<font style="color: red">*</font> </label>
                <input
                    type="date"
                    class="form-control singledatepicker"
                    id="dob"
                    name="dob"
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
