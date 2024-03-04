<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import SearchSelect from '@/Components/SearchSelect.vue'
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { removeLoader, showLoader } from '@/scripts/loader';
import axios from 'axios';
import { showPopover } from '@/scripts/popover';

const props = defineProps<{
    accounts?: { value: string; label: string }[];
    stage?: string[];
}>();

const stageValues = props.stage ? props.stage : [];
const accountValues = props.accounts ? props.accounts : [];

const accountValidValues = accountValues.map(obj => obj.value);

const schema = yup.object({
    name: yup.string().required(),
    stage: yup.string().required().oneOf(stageValues, 'Please select valid stage'),
    account: yup.string().required().oneOf(accountValidValues, 'Please select valid account'),
    date: yup.date().required('Please enter a date').max(new Date(2099, 11, 31), 'Please enter valid date').typeError('Please enter valid date'),
});

const initialValues = {
    stage: 'Qualification',
    date: new Date().toISOString().split('T')[0]
};

const submit = (values: any, { resetForm }: any) => {
    showLoader();
    axios.post(route('deal.store'), values)
        .then(function () {
            removeLoader();
            resetForm();
            setTimeout(() => {
                resetForm();
            }, 10)
            showPopover('Deal has been created');
        })
        .catch(function (error) {
            removeLoader();
            alert('An error occurred while processing the form, please check that the fields are filled in correctly and try again.')
        });
};

</script>

<template>

    <Head title="Create New Deal" />
    <MainLayout nav-active="deals">
        <div class="small-container">
            <h3 class="mb-3">Create Deal</h3>
            <Form @submit="submit" :validation-schema="schema" :initial-values="initialValues">
                <div class="mb-3">
                    <label for="nameInput" class="form-label form-label--required">Deal Name</label>
                    <Field name="name" id="nameInput" class="form-control" />
                    <ErrorMessage class="error-message" name="name" />
                </div>
                <div class="mb-3">
                    <label for="stageSelect" class="form-label form-label--required">Deal Stage</label>
                    <Field name="stage" v-slot="{ field }">
                        <select v-bind="field" class="form-select" id="stageSelect">
                            <option v-for="(value, key) in stageValues" :key="key" :value="value">{{ value }}</option>
                        </select>
                    </Field>
                    <ErrorMessage class="error-message" name="stage" />
                </div>
                <div class="mb-3">
                    <label for="accountInput" class="form-label form-label--required">Account</label>
                    <Field name="account" v-slot="{ field }">
                        <SearchSelect v-bind="field" :options="accountValues" />
                    </Field>
                    <ErrorMessage class="error-message" name="account" />
                </div>
                <div class="mb-3">
                    <label for="dateInput" class="form-label form-label--required">Closing Date</label>
                    <Field name="date" id="dateInput" type="date" class="form-control" />
                    <ErrorMessage class="error-message" name="date" />
                </div>
                <div class="form-text mb-3">Fields marked <span class="text-danger">*</span> are required</div>
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </Form>
        </div>
    </MainLayout>
</template>

<style lang="scss"></style>
