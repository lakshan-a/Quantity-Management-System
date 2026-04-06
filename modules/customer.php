<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers — SaaSify</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="app-wrapper">

<?php $current_page = 'customers'; include '../includes/sidebar.php'; ?>

<div class="main-area">
<?php $page_title = 'Customers'; include '../includes/header.php'; ?>

<div class="page-content">

  <!-- Page Header -->
  <div class="page-header">
    <div>
      <h1 class="page-title" data-t="customers">Customers</h1>
      <p class="page-subtitle">Manage your customer database</p>
    </div>
    <div class="page-actions">
      <button class="btn btn-secondary" onclick="exportTable()">📤 <span data-t="export">Export</span></button>
      <button class="btn btn-primary" onclick="Modal.open('modal-add-customer')">
        + <span data-t="add_customer">Add Customer</span>
      </button>
    </div>
  </div>

  <!-- Filters -->
  <div class="filters-bar">
    <input type="text" class="form-control filter-input" id="search-customers"
           data-t-ph="search" placeholder="Search customers...">
    <select class="form-control" style="width:auto;" id="filter-city">
      <option value="">All Cities</option>
      <option>Colombo</option><option>Gampaha</option><option>Kandy</option>
      <option>Galle</option><option>Matara</option>
    </select>
    <select class="form-control" style="width:auto;" id="filter-district">
      <option value="">All Districts</option>
      <option>Western</option><option>Central</option><option>Southern</option>
    </select>
  </div>

  <!-- Table -->
  <div class="card" style="padding:0;">
    <div class="table-wrapper" style="border:none;">
      <table id="customers-table">
        <thead>
          <tr>
            <th>#</th>
            <th data-t="customer_name">Customer Name</th>
            <th data-t="phone">Phone</th>
            <th data-t="email">Email</th>
            <th data-t="city">City</th>
            <th data-t="district">District</th>
            <th data-t="actions">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $customers = [
            [1,'Kasun Perera','0711234567','kasun@email.com','Colombo','Western'],
            [2,'Nimal Silva','0772345678','nimal@email.com','Kandy','Central'],
            [3,'Amara Fernando','0763456789','amara@email.com','Galle','Southern'],
            [4,'Ruwan Jayasinghe','0754567890','ruwan@email.com','Gampaha','Western'],
            [5,'Sunil Bandara','0745678901','sunil@email.com','Matara','Southern'],
            [6,'Chathura Rajapaksa','0736789012','chathura@email.com','Colombo','Western'],
            [7,'Dilini Peris','0727890123','dilini@email.com','Negombo','Western'],
            [8,'Sanduni Herath','0718901234','sanduni@email.com','Kandy','Central'],
          ];
          foreach($customers as $c): ?>
          <tr>
            <td><span class="text-muted"><?= $c[0] ?></span></td>
            <td>
              <div style="display:flex;align-items:center;gap:10px;">
                <div class="avatar"><?= strtoupper($c[1][0]) ?></div>
                <strong><?= $c[1] ?></strong>
              </div>
            </td>
            <td><?= $c[2] ?></td>
            <td><span class="text-muted"><?= $c[3] ?></span></td>
            <td><?= $c[4] ?></td>
            <td><?= $c[5] ?></td>
            <td>
              <div class="table-actions">
                <button class="btn btn-ghost btn-icon btn-sm" title="View"
                        onclick="viewCustomer(<?= $c[0] ?>)">👁️</button>
                <button class="btn btn-ghost btn-icon btn-sm" title="Edit"
                        onclick="editCustomer(<?= $c[0] ?>)">✏️</button>
                <button class="btn btn-ghost btn-icon btn-sm" title="Delete"
                        onclick="confirmDelete(() => deleteCustomer(<?= $c[0] ?>))">🗑️</button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- Pagination -->
    <div class="pagination">
      <div class="pagination-info">
        <span data-t="showing">Showing</span> 1–8 <span data-t="of">of</span> 642 <span data-t="entries">entries</span>
      </div>
      <div style="display:flex;gap:4px;">
        <button class="page-btn">‹</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <span style="padding:0 4px;color:var(--text-muted);line-height:32px;">...</span>
        <button class="page-btn">81</button>
        <button class="page-btn">›</button>
      </div>
    </div>
  </div>

</div><!-- end page-content -->
</div><!-- end main-area -->
</div><!-- end app-wrapper -->

<!-- Add/Edit Customer Modal -->
<div class="modal-overlay" id="modal-add-customer">
  <div class="modal modal-lg">
    <div class="modal-header">
      <h3 class="modal-title" data-t="add_customer">Add Customer</h3>
      <button class="modal-close" onclick="Modal.close('modal-add-customer')">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-grid form-grid-2">
        <div class="form-group">
          <label class="form-label">Full Name <span class="required">*</span></label>
          <input type="text" class="form-control" data-t-ph="customer_name" placeholder="Customer Name">
        </div>
        <div class="form-group">
          <label class="form-label" data-t="phone">Phone</label>
          <input type="tel" class="form-control" placeholder="+94 71 234 5678">
        </div>
        <div class="form-group">
          <label class="form-label" data-t="email">Email</label>
          <input type="email" class="form-control" placeholder="customer@email.com">
        </div>
        <div class="form-group">
          <label class="form-label" data-t="city">City</label>
          <input type="text" class="form-control" placeholder="City">
        </div>
        <div class="form-group">
          <label class="form-label" data-t="district">District</label>
          <select class="form-control">
            <option value="">Select District</option>
            <option>Western</option><option>Central</option><option>Southern</option>
            <option>Northern</option><option>Eastern</option><option>North Western</option>
            <option>North Central</option><option>Uva</option><option>Sabaragamuwa</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label" data-t="postal_code">Postal Code</label>
          <input type="text" class="form-control" placeholder="10000">
        </div>
        <div class="form-group full">
          <label class="form-label" data-t="address">Address</label>
          <textarea class="form-control" placeholder="Full address..."></textarea>
        </div>
        <div class="form-group full">
          <label class="form-label" data-t="notes">Notes</label>
          <textarea class="form-control" placeholder="Optional notes..." style="min-height:70px;"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="Modal.close('modal-add-customer')" data-t="cancel">Cancel</button>
      <button class="btn btn-primary" onclick="saveCustomer()" data-t="save">Save Customer</button>
    </div>
  </div>
</div>

<div id="toast-container" class="toast-container"></div>
<script src="../assets/js/main.js"></script>
<script>
  tableSearch('search-customers', 'customers-table');

  function viewCustomer(id) { Toast.info('Viewing customer #' + id); }
  function editCustomer(id) {
    document.querySelector('#modal-add-customer .modal-title').textContent = 'Edit Customer';
    Modal.open('modal-add-customer');
  }
  function deleteCustomer(id) { console.log('Delete customer', id); }
  function saveCustomer() {
    Modal.close('modal-add-customer');
    Toast.success(Lang.get('save_success'));
  }
  function exportTable() { Toast.info('Exporting customers...'); }
  function clearFilters() {
    document.getElementById('search-customers').value = '';
    document.getElementById('filter-city').value = '';
    document.getElementById('filter-district').value = '';
    document.getElementById('customers-table').querySelectorAll('tbody tr').forEach(r => r.style.display = '');
  }
</script>
</body>
</html>