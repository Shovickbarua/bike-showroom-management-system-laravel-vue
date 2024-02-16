<script setup></script>

<template>
    <form id="myForm" method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Category<font>*</font></label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Category"
                    name="cat_name"
                    value=""
                />
            </div>

            <div class="form-group col-md-12">
                <button
                    type="submit"
                    class="btn btn-primary btn-sm"
                    name="cat_btn"
                >
                    Save
                </button>
            </div>
        </div>
    </form>
</template>
