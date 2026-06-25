<script>
/* ── UI Logic for Modals ── */
function openAddModal() {
    document.getElementById('editId').value = '';
    document.getElementById('modalTitle').textContent = 'Add New Account';
    document.getElementById('submitLabel').textContent = 'Save Account';
    document.getElementById('accountForm').reset();
    selectType('web');
    document.getElementById('addModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.body.style.overflow = '';
}

function selectType(type) {
    var webEl = document.getElementById('typeWeb');
    var appEl = document.getElementById('typeApp');
    if (type === 'web') {
        webEl.className = webEl.className.replace('border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800','border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20');
        appEl.className = appEl.className.replace('border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20','border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800');
        webEl.querySelector('input').checked = true;
    } else {
        appEl.className = appEl.className.replace('border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800','border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20');
        webEl.className = webEl.className.replace('border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20','border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800');
        appEl.querySelector('input').checked = true;
    }
}

/* ── Delete Confirm Modal ── */
var _deleteId = null;

function openDeleteModal(id, serviceName) {
    _deleteId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    _deleteId = null;
    document.getElementById('deleteModal').classList.add('hidden');
    document.body.style.overflow = '';
}

function confirmDelete() {
    if (!_deleteId) return;
    deleteAccount(_deleteId);
    closeDeleteModal();
}

function toggleModalPwd() {
    var inp = document.getElementById('f-password');
    inp.type = inp.type === 'password' ? 'text' : 'password';
}

/* ── View Password Modal ── */
function openPwdModal(id) {
    document.getElementById('pwdModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePwdModal() {
    document.getElementById('pwdModal').classList.add('hidden');
    document.body.style.overflow = '';
}

function showToast(msg) {
    var t = document.createElement('div');
    t.textContent = '✓ ' + msg;
    t.className = 'fixed bottom-6 right-6 z-[9999] bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-sm font-semibold px-5 py-3 rounded-xl shadow-xl animate-slide-up';
    document.body.appendChild(t);
    setTimeout(function() {
        t.style.opacity = '0';
        t.style.transition = 'opacity 0.3s';
        setTimeout(function() { t.remove(); }, 300);
    }, 2500);
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAddModal();
        closePwdModal();
        closeDeleteModal();
    }
});

/* Note: Edit, Delete, Copy, and Save Account backend logic would be added here */
</script>
