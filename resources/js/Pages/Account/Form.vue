<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';

const schema = yup.object({
  name: yup.string().required(),
  phone:  yup.string().matches(/^(\d+(-\d+)*)?$/, 'Invalid phone format'),
  website: yup.string().matches(/^[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)+$/, 'Invalid URL format'),
});

const submit = () => {
    console.log('Form has been submited!');
};

</script>

<template>
    <Head title="Dashboard" />
    <MainLayout nav-active="accounts">
        <div class="small-container">
            <h3 class="mb-3">Create account</h3>
            <Form @submit="submit" :validation-schema="schema">
                <div class="mb-3">
                    <label for="nameInput" class="form-label form-label--required">Account Name</label>
                    <Field name="name" id="nameInput" class="form-control" />
                    <ErrorMessage class="error-message" name="name"/>
                </div>
                <div class="mb-3">
                    <label for="phoneInput" class="form-label">Account phone</label>
                    <Field name="phone" id="phoneInput" type="tel" class="form-control" />
                    <ErrorMessage class="error-message" name="phone"/>
                </div>
                <div class="mb-3">
                    <label for="websiteInput" class="form-label">Account website</label>
                    <Field name="website" id="websiteInput" class="form-control" />
                    <ErrorMessage class="error-message" name="website"/>
                </div>
                <div class="form-text mb-3">Fields marked <span class="text-danger">*</span> are required</div>
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </form>
        </div>
    </MainLayout>
</template>

<style lang="scss">

</style>