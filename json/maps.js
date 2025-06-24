// menampilkan maps
export async function initMap() {
const response = await fetch("json/maps.json");
const json = await response.json();
const local = JSON.parse(localStorage.getItem("clinics")) || [];
const data = [...json, ...local];

const map = new google.maps.Map(document.getElementById("map_canvas"), {
    center: { lat: 1.4637845429712284, lng: 124.84728359893482 },
    zoom: 13,
    mapId: "a917f75ccfbbb5a8f4c6dfc4"
});

const infowindow = new google.maps.InfoWindow();

data.forEach(building => {
    const marker = new google.maps.marker.AdvancedMarkerElement({
    map,
    position: { lat: building.lat, lng: building.lng },
    title: building.name,
    content: document.createElement("div")
    });

    const iconUrl = building.type === "rs"
    ? "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
    : "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";

    marker.content.style.backgroundImage = `url(${iconUrl})`;
    marker.content.style.width = "32px";
    marker.content.style.height = "32px";
    marker.content.style.backgroundSize = "contain";

    marker.addListener("click", () => {
    infowindow.close();
    infowindow.setContent(`
        <div style="font-family: Arial; font-size: 14px;">
            <strong>${building.name}</strong><br>
            <a href="https://www.google.com/maps?q=${building.lat},${building.lng}" 
            target="_blank" 
            style="color: #1a73e8; text-decoration: underline; font-weight: normal;">
            📍 Lihat di Google Maps
            </a>
        </div>
    `);
    infowindow.open(map, marker);
    });
});

const legend = document.createElement("div");
legend.innerHTML = `
    <div style="background: white; margin-left:20px; padding: 10px 14px; border-radius: 6px; font-size: 14px;
                box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
    <div style="display: flex; align-items: center; margin-bottom: 6px;">
        <div style="width: 16px; height: 16px; margin-right: 8px;
        background-image: url('http://maps.google.com/mapfiles/ms/icons/red-dot.png');
        background-size: contain; background-repeat: no-repeat;"></div>
        Rumah Sakit
    </div>
    <div style="display: flex; align-items: center;">
        <div style="width: 16px; height: 16px; margin-right: 8px;
        background-image: url('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
        background-size: contain; background-repeat: no-repeat;"></div>
        Klinik Mata
    </div>
    </div>
`;
map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

window.initMap = initMap;


// Tambah Data
if (document.getElementById("map-form")) {
    document.getElementById("map-form").addEventListener("submit", (e) => {
        e.preventDefault();
        const name = document.getElementById("clinic-name").value;
        const lat = parseFloat(document.getElementById("clinic-lat").value);
        const lng = parseFloat(document.getElementById("clinic-lng").value);
        const type = document.getElementById("clinic-type").value;

        const clinics = JSON.parse(localStorage.getItem("clinics")) || [];

        const editIndex = document.getElementById("map-form").getAttribute("data-edit-index");

        if (editIndex !== null) {
            clinics[parseInt(editIndex)] = { name, lat, lng, type };
            document.getElementById("map-form").removeAttribute("data-edit-index");
        } else {
            clinics.push({ name, lat, lng, type });
        }

        localStorage.setItem("clinics", JSON.stringify(clinics));
        document.getElementById("map-form").reset();
        updateList();
    });


function updateList() {
    const display = document.getElementById("clinic-json");
    const tableBody = document.querySelector("#clinic-table tbody");
    const localClinics = (JSON.parse(localStorage.getItem("clinics")) || []).map(c => ({ ...c, editable: true }));

    fetch("../../json/maps.json")
        .then(res => res.json())
        .then(jsonClinics => {
            const fixedClinics = jsonClinics.map(c => ({ ...c, editable: false }));
            const allClinics = [...fixedClinics, ...localClinics];

            tableBody.innerHTML = "";
            allClinics.forEach((clinic, index) => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${clinic.name}</td>
                    <td>${clinic.lat}</td>
                    <td>${clinic.lng}</td>
                    <td>${clinic.type}</td>
                    <td>
                        ${clinic.editable
                            ? `<button onclick="editClinic(${index - fixedClinics.length})" style="width:auto; background-color:orange">Edit</button>
                                <button onclick="deleteClinic(${index - fixedClinics.length}) " style="width:auto; background-color:red">Delete</button>`
                            : `<em style="color:gray;">Data default</em>`
                        }
                    </td>
                `;
                tableBody.appendChild(row);
            });

            display.textContent = JSON.stringify(allClinics, null, 2);
        })
        .catch(() => {
            tableBody.innerHTML = "<tr><td colspan='6'>Gagal memuat data JSON.</td></tr>";
            display.textContent = JSON.stringify(localClinics, null, 2);
        });
}


// EDIT
window.editClinic = function (index) {
    const clinics = JSON.parse(localStorage.getItem("clinics")) || [];
    const clinic = clinics[index];
    document.getElementById("clinic-name").value = clinic.name;
    document.getElementById("clinic-lat").value = clinic.lat;
    document.getElementById("clinic-lng").value = clinic.lng;
    document.getElementById("clinic-type").value = clinic.type;
    document.getElementById("map-form").setAttribute("data-edit-index", index);
};

// DELETE
window.deleteClinic = function (index) {
    const clinics = JSON.parse(localStorage.getItem("clinics")) || [];
    if (confirm("Yakin ingin menghapus data ini?")) {
        clinics.splice(index, 1);
        localStorage.setItem("clinics", JSON.stringify(clinics));
        updateList();
    }
};

document.addEventListener("DOMContentLoaded", updateList);
}