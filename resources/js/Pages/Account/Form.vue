<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { showLoader, removeLoader } from '@/scripts/loader';
import { showPopover } from '@/scripts/popover';

const schema = yup.object({
    name: yup.string().required(),
    phone: yup.string().matches(/^(\d+(-\d+)*)?$/, 'Invalid phone format'),
    website: yup.string().matches(/^[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)+$/, 'Invalid URL format'),
});

const submit = (values: any, { resetForm }: any) => {
    showLoader();
    axios.post(route('account.store'), values)
        .then(function () {
            removeLoader();
            resetForm();
            showPopover('Account has been created');
        })
        .catch(function () {
            removeLoader();
            alert('An error occurred while processing the form, please check that the fields are filled in correctly and try again.')
        });
};
</script>

<template>

    <Head title="Create New Account" />
    <MainLayout nav-active="accounts">
        <div class="small-container">
            <h3 class="mb-3">Create account</h3>
            <Form @submit="submit" :validation-schema="schema">
                <div class="mb-3">
                    <label for="nameInput" class="form-label form-label--required">Account Name</label>
                    <Field name="name" id="nameInput" class="form-control" />
                    <ErrorMessage class="error-message" name="name" />
                </div>
                <div class="mb-3">
                    <label for="phoneInput" class="form-label">Account phone</label>
                    <Field name="phone" id="phoneInput" type="tel" class="form-control" />
                    <ErrorMessage class="error-message" name="phone" />
                </div>
                <div class="mb-3">
                    <label for="websiteInput" class="form-label">Account website</label>
                    <Field name="website" id="websiteInput" class="form-control" />
                    <ErrorMessage class="error-message" name="website" />
                </div>
                <div class="form-text mb-3">Fields marked <span class="text-danger">*</span> are required</div>
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </form>
        </div>
    </MainLayout>
</template>

<style lang="scss"></style>