

document.querySelectorAll('.dropdown > a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();
        const parentLi = event.target.closest('li');
        const submenu = parentLi.querySelector('.submenu');
        
        // Alterna a visibilidade do submenu
        if (submenu) {
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        }
    });
});




// Lógica para colapsar/expandir o menu lateral
const toggleBtn = document.getElementById('sidebar-toggle');
const sidebar = document.querySelector('.sidebar');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
});


// Adicione este código ao seu arquivo script.js

// Lógica do Modal de CRUD
const crudModal = document.getElementById('crud-modal');
const modalTitle = document.getElementById('modal-title');
const closeBtn = document.querySelector('.modal .close-btn');
const addBtn = document.getElementById('add-province-btn');
const crudForm = document.getElementById('crud-form');
const provinceIdInput = document.getElementById('province-id');
const nameInput = document.getElementById('name');
const capitalInput = document.getElementById('capital');
const populationInput = document.getElementById('population');
const provincesTbody = document.getElementById('provinces-tbody');

// Simular dados da base de dados (em um projeto real, isso viria de uma API)
let provinces = [
    { id: 1, name: 'Luanda', capital: 'Luanda', population: 8300000 },
    { id: 2, name: 'Benguela', capital: 'Benguela', population: 2400000 },
    { id: 3, name: 'Huambo', capital: 'Huambo', population: 2600000 },
];
let nextId = provinces.length > 0 ? Math.max(...provinces.map(p => p.id)) + 1 : 1;

// Função para renderizar a tabela
function renderTable() {
    provincesTbody.innerHTML = '';
    provinces.forEach(province => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${province.id}</td>
            <td>${province.name}</td>
            <td>${province.capital}</td>
            <td>${province.population.toLocaleString('pt-AO')}</td>
            <td class="action-btns">
                <button class="edit-btn" data-id="${province.id}"><i class="fas fa-edit"></i></button>
                <button class="delete-btn" data-id="${province.id}"><i class="fas fa-trash-alt"></i></button>
            </td>
        `;
        provincesTbody.appendChild(row);
    });
}

// Abrir Modal
function openModal(action, province = null) {
    if (action === 'add') {
        modalTitle.textContent = 'Registar Província';
        crudForm.reset();
        provinceIdInput.value = '';
    } else if (action === 'edit' && province) {
        modalTitle.textContent = 'Editar Província';
        provinceIdInput.value = province.id;
        nameInput.value = province.name;
        capitalInput.value = province.capital;
        populationInput.value = province.population;
    }
    crudModal.style.display = 'flex';
    setTimeout(() => crudModal.classList.add('show'), 10);
}

// Fechar Modal
function closeModal() {
    crudModal.classList.remove('show');
    setTimeout(() => crudModal.style.display = 'none', 300);
}

// Eventos
addBtn.addEventListener('click', () => openModal('add'));
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', (event) => {
    if (event.target === crudModal) {
        closeModal();
    }
});



provincesTbody.addEventListener('click', (event) => {
    const targetBtn = event.target.closest('.edit-btn, .delete-btn');
    if (!targetBtn) return;

    const id = parseInt(targetBtn.dataset.id);
    const province = provinces.find(p => p.id === id);

    if (targetBtn.classList.contains('edit-btn')) {
        openModal('edit', province);
    } else if (targetBtn.classList.contains('delete-btn')) {
                    if (confirm("Tem certeza que deseja apagar a província de ${province.name}?")) {
            provinces = provinces.filter(p => p.id !== id);
            renderTable();
        }
    }
});

/*Chamar a função para renderizar a tabela na primeira vez
   crudForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const id = provinceIdInput.value;
    const newProvince = {
        name: nameInput.value,
        capital: capitalInput.value,
        population: parseInt(populationInput.value),
    };

    if (id) {
        // Editar
        const index = provinces.findIndex(p => p.id == id);
        if (index !== -1) {
            provinces[index] = { ...provinces[index], ...newProvince };
        }
    } else {
        // Adicionar
        newProvince.id = nextId++;
        provinces.push(newProvince);
    }
    
    // Simular envio de dados para o backend e fechar o modal
    renderTable();
    closeModal();
});
renderTable();
*/



