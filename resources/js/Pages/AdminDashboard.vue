<template>
    <h1>Welcome Admin</h1><button class="btn btn-danger" @click="logout()">Logout</button>
</template>
<script>
import axios from "axios";
import { Inertia } from '@inertiajs/inertia';
export default {
  methods: {
    async logout() {
      await axios.post('/logout');
      Inertia.visit('/admin_login');
    }
  }

};
</script>