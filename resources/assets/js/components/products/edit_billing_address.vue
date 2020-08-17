<template>
    <div class="">
        <!-- Retornamos a la ultima vista -->
        <returnback></returnback>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-3 text-uppercase">Modifica indirizzo di fatturazione</h2>
                    <form action="">
                        <div class="form-group">
                            <label class="mb-0">Nome completo</label>
                            <input type="text" :maxlength="30" v-validate="'required|alpha_spaces'" name="name"
                                   :class="{'is-danger': errors.has('name') }" v-model="form.name"
                                   class="form-control form-material" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Mail</label>
                            <input type="email" v-validate="'required|email'" name="email"
                                   :class="{'is-danger': errors.has('email') }" v-model="form.email"
                                   class="form-control form-material" placeholder="Mail">
                        </div>
                        <hr>
                        <div class="form-group" v-if="storeForm">
                            <label class="mb-0">Search your address</label>
                            <vuetify-google-autocomplete
                                    :id="googleSearch.id"
                                    :clearable="googleSearch.clearable"
                                    :disabled="googleSearch.disabled"
                                    :enable-geolocation="googleSearch.enableGeolocation"
                                    :placeholder="googleSearch.placeholderText"
                                    :required="googleSearch.required"
                                    :types="googleSearch.types"
                                    @placechanged="getAddressData"
                            >
                            </vuetify-google-autocomplete>
                        </div>
                        <hr>
                        <div class="form-group" v-if="storeForm">
                            <label class="mb-0">Indirizzo linea</label>
                            <input type="text" v-validate="'required'" name="address"
                                   :class="{'is-danger': errors.has('address') }" v-model="form.address"
                                   class="form-control form-material" placeholder="Indirizzo linea">
                        </div>
                        <div class="form-group" v-if="storeForm">
                            <label class="mb-0">Città</label>
                            <input type="text" :maxlength="30" v-validate="'required|alpha_spaces'" name="city"
                                   :class="{'is-danger': errors.has('city') }" v-model="form.city"
                                   class="form-control form-material" placeholder="Città">
                        </div>
                        <div class="form-group" v-if="storeForm">
                            <label class="mb-0">Provincia / Regione</label>
                            <input type="text" :maxlength="30" v-validate="'required'" name="state"
                                   :class="{'is-danger': errors.has('state') }" v-model="form.state"
                                   class="form-control form-material" placeholder="Provincia / Regione">
                        </div>
                        <div class="form-group" v-if="storeForm">
                            <label class="mb-0">Codice postale</label>
                            <input type="text" :maxlength="10" v-validate="'required|numeric'" name="zip"
                                   :class="{'is-danger': errors.has('zip') }" v-model="form.zip"
                                   class="form-control form-material" placeholder="Codice postale">
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Telefono</label>
                            <input type="text" :maxlength="20" v-validate="'required|numeric'" name="phone"
                                   :class="{'is-danger': errors.has('phone') }" v-model="form.phone"
                                   class="form-control form-material" placeholder="Telefono">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-validate="'required'" name="terms"
                                   :class="{'is-danger': errors.has('terms') }" v-model="form.terms" type="checkbox"
                                   value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                He letto ed accetto i termini e le Condizioni d'uso
                            </label>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" @click="nextCheckout()" class="btn btn-danger btn-block btn-lg">
                                Salva
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    address: null,
                    city: null,
                    zip: null,
                    phone: null,
                    terms: null,
                    ltd: '',
                    lng: ''
                },
                storeForm: true,
                googleSearch: {
                    id: 'map',
                    clearable: false,
                    disabled: false,
                    enableGeolocation: true,
                    required: true,
                    placeholderText: 'Enter address',
                    types: 'address',
                    country: "it",
                }
            }
        },
        mounted() {
            this.loadValues();
            this.loadForm();
            },
        methods: {
            loadForm() {
                //v-if="storeForm"
                let order_data = this.$store.getters.getStore;
                if (order_data.presentation_act == 2) { //store
                    this.storeForm = false;
                }
            },
            loadValues() {
                this.dataSession = this.$store.getters.getSession;
                let data = this.$store.getters.getAdress;
                if (data != undefined) {
                    this.form = data;
                }
            },
            nextCheckout() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.$store.dispatch('setAdress', this.form).then((r) => {
                            this.$router.push('/payment');
                        }).catch(() => {
                            console.log('error store')
                        });
                    }
                }).catch(() => {
                    console.log('error form')
                });
            },
            getAddressData(addressData, placeResultData) {
                this.address = addressData;

                if (addressData !== null) {
                    this.form = {
                        name: this.form.name,
                        email: this.form.email,
                        address: placeResultData.formatted_address,
                        city: addressData.country,
                        zip: addressData.postal_code,
                        ltd: addressData.latitude,
                        lng: addressData.longitude,
                        phone: this.form.phone,
                        terms: this.form.terms
                    };

                    /* Zu´Pietrù's latitude & longitude (40.940628, 9.516872) */
                    let origin = {
                        lat: 40.940628,
                        lng: 9.516872
                    };

                    let distance = this.getDistance(origin.lat, origin.lng, this.form.ltd, this.form.lng);

                    if (distance <= 20) {
                        alert('3 hours for your delivery: ' + distance + 'km');
                    }
                    else if (distance >= 21 && distance <= 50) {
                        alert('6 hours for your delivery: ' + distance + 'km');
                    }
                    else if (distance >= 51 && distance <= 100) {
                        alert('24 hours for your delivery: ' + distance + 'km');
                    }
                    else if (distance >= 101 && distance <= 200) {
                        alert('48 hours for your delivery: ' + distance + 'km');
                    }
                    else {
                        alert('you are far away! ' + distance + 'km')
                    }

                }
            },
            getDistance(lat1, lon1, lat2, lon2) {
                function _deg2rad(deg) {
                    return deg * (Math.PI / 180)
                }

                const R = 6371; // Radius of the earth in km
                let dLat = _deg2rad(lat2 - lat1);  // deg2rad below
                let dLon = _deg2rad(lon2 - lon1);
                let a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(_deg2rad(lat1)) * Math.cos(_deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                let d = R * c; // Distance in km
                return d.toFixed(3);
            }
        }
    }
</script>