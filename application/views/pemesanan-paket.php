<style>
    .opsi {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        "

    }

    .opsi8 {
        width: 49%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        "

    }

    .opsi12 {
        width: 32.5%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        "

    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
</style>
<div class="row" style="margin-right:0px;margin-left:0px;">
    <div class="col-6">
        <main>
            <h2 class="u-h3 u-mb-small">Pemesanan Instruktur</h2>
            <div class="c-card u-p-medium u-text-small u-mb-small">
                <h6 class="u-text-bold">Form Pemesanan</h6>
                <form action="<?php echo site_url('order/pesan_paket'); ?>" method="post">
                    <input type="hidden" name="id_instruktur" value="<?php echo $instruktur_detail->id_instruktur ?>">
                    <input type="hidden" name="id_member" value="<?php echo $member_detail->id ?>">
                    <input type="hidden" name="id_paket" value="<?php echo $instruktur_detail->id ?>">
                    <input type="hidden" name="sesi" value="<?php echo $instruktur_detail->jumlah_sesi ?>">
                    <input type="hidden" name="jenis" value="<?php echo $jenis ?>">
                    <div class="col-sm-12">
                        <div class="row u-mb-medium">
                            <div class="c-field">
                                <label class="c-field__label" for="input13">Nama</label>
                                <input class="c-input" type="text" name="nama" id="nama" placeholder="nama" value="<?php echo $member_detail->nama; ?>" disabled>
                            </div>
                        </div>
                        <div class="row u-mb-medium">
                            <div class="c-field">
                                <label class="c-field__label" for="input13">No. Telpon</label>
                                <input class="c-input" type="text" name="no telepon" id="no telepon" placeholder="no telepon" value="<?php echo $member_detail->no_telepon; ?>" disabled>
                            </div>
                        </div>
                        <div class="row u-mb-medium">
                            <div class="c-field">
                                <label class="c-field__label" for="input13">Pilih Hari</label>
                                <?php if ($instruktur_detail->jumlah_sesi == 4) { ?>
                                    <select name="hari1" class="opsi">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                <?php } else if ($instruktur_detail->jumlah_sesi == 8) { ?>
                                    <select name="hari1" class="opsi8">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <select name="hari2" class="opsi8">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                <?php } elseif ($instruktur_detail->jumlah_sesi == 12) { ?>
                                    <select name="hari1" class="opsi12">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <select name="hari2" class="opsi12">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <select name="hari3" class="opsi12">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row u-mb-medium">
                            <div class="c-field">
                                <label class="c-field__label" for="input13">Jam</label>
                                <?php if ($instruktur_detail->jumlah_sesi == 4) { ?>
                                    <select class="opsi" id="sel1" name="jam1" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } elseif ($instruktur_detail->jumlah_sesi == 8) { ?>
                                    <select class="opsi8" id="sel1" name="jam1" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="opsi8" id="sel1" name="jam2" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } elseif ($instruktur_detail->jumlah_sesi == 12) { ?>
                                    <select class="opsi12" id="sel1" name="jam1" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="opsi12" id="sel1" name="jam2" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="opsi12" id="sel1" name="jam3" required>
                                        <?php foreach ($jam as $j) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row u-mb-medium">
                            <div class="c-field">
                                <label class="c-field__label" for="input13">Lokasi</label>
                                <input type="hidden" id="lokasi" name="lokasi">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box (Wajib diisi)" onkeyup="fill_location()" required>
                                <div id="map"></div>
                                <div class="centerMarker"></div>
                            </div>
                        </div>
                        <div class="row u-mb-medium">
                            <input type="submit" class="c-btn c-btn--success c-btn--fullwidth" name="submit" value="Pesan" onClick="return confirm('Apa anda yakin ingin memesan event ini?');">
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <div class="col-6">
        <main>
            <h2 class="u-h3 u-mb-small">Detail Pemesanan</h2>
            <div class="c-card u-p-medium u-text-small u-mb-small">
                <h6 class="u-text-bold">Informasi Instruktur</h6>

                <dl class="u-flex u-pv-small u-border-bottom">
                    <dt class="u-width-25">Nama</dt>
                    <dd><?php echo $instruktur_detail->nama ?></dd>
                </dl>

                <dl class="u-flex u-pv-small u-border-bottom">
                    <dt class="u-width-25">Jenis Olahraga</dt>
                    <dd>
                        <?php echo $instruktur_detail->agenda ?>
                    </dd>
                </dl>
            </div>
            <div class="c-table-responsive@desktop">
                <table class="c-table">
                    <caption class="c-table__title">
                        <div class="row">
                            <div class="col-6">
                                Kelas <small>Detail Kelas</small>
                            </div>
                        </div>
                    </caption>
                    <thead class="c-table__head c-table__head--slim">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head no-sort">Durasi</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Sesi</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Harga</th>
                            <th class="c-table__cell c-table__cell--head no-sort">Jam</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell"><?php echo $instruktur_detail->durasi ?> Menit</td>
                            <td class="c-table__cell"><?php echo $instruktur_detail->jumlah_sesi ?></td>
                            <td class="c-table__cell">Rp <?php echo $instruktur_detail->harga ?>,-</td>
                            <td class="c-table__cell"><?php echo $instruktur_detail->rentang_jam ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <?php if ($jenis == 'paket' and count($error) >1) {?>
            <?php for ($i = 0; $i < count($error); $i++) { ?>
                <div class="alert alert-danger" role="alert">
                    Jadwal penuh pada <?php echo $error[$i][0].', '.$error[$i][1] .' Pukul '.$error[$i][2]?>
                </div>
            <?php } } if ($jenis == 'paket' and count($error)==1) {?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php }?>

        </main>
    </div>
</div>

</div>
</div>



<script src="<?php echo base_url('resources/'); ?>js/main.min.js"></script>
</body>


<script>
    var map;
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -7.966620,
                lng: 112.632632
            },
            zoom: 10,
            fullscreenControl: false,
            mapTypeControl: false,
            styles: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffe6"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#1717ff"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#f5f1e6"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#c9b2a6"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#dcd2be"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#ae9e90"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffc1"
                    }]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#93817c"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#a5b076"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#447530"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#fadaf2"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffbbbb"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#e92e32"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ff0000"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "color": "#ff0000"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#ff0000"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ff9d9d"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#db8555"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#f068e6"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#dfd2ae"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8f7d77"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ebe3cd"
                    }]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "transit.station.bus",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "transit.station.rail",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "on"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#adeef1"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#92998d"
                    }]
                }
            ]
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    function fill_location() {
        // document.getElementById("lokasi_status").style.visibility = "visible";
        var NewMapCenter = map.getCenter();
        var latitude = NewMapCenter.lat();
        var longitude = NewMapCenter.lng();
        console.log(longitude);
        document.getElementById('lokasi').value = latitude + ';' + longitude;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3iF5rAofQ_BDNAXs3wx0eUSHXHTzWC7k&libraries=places&callback=initAutocomplete" async defer></script>


</html>