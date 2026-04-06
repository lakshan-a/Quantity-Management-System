/* ============================================================
   SAAS - Main JavaScript
   ============================================================ */

/* ── Language Translations ── */
const TRANSLATIONS = {
  en: {
    // Nav
    dashboard: "Dashboard", customers: "Customers", items: "Items",
    orders: "Orders", order_items: "Order Items", payments: "Payments",
    returns: "Returns", damages: "Damages", users: "Users",
    businesses: "Businesses", categories: "Categories", wholesalers: "Wholesalers",
    couriers: "Couriers", logout: "Logout", settings: "Settings",
    // Common
    add: "Add", edit: "Edit", delete: "Delete", save: "Save", cancel: "Cancel",
    search: "Search", filter: "Filter", export: "Export", print: "Print",
    view: "View", confirm: "Confirm", back: "Back", close: "Close",
    yes: "Yes", no: "No", actions: "Actions", status: "Status",
    created_at: "Created At", updated_at: "Updated At", notes: "Notes",
    select: "Select", loading: "Loading...", total: "Total", submit: "Submit",
    // Auth
    login: "Login", email: "Email Address", password: "Password",
    remember_me: "Remember me", forgot_password: "Forgot password?",
    login_title: "Welcome back", login_subtitle: "Sign in to your account",
    // Dashboard
    total_orders: "Total Orders", total_revenue: "Total Revenue",
    total_customers: "Total Customers", total_items: "Total Items",
    recent_orders: "Recent Orders", low_stock: "Low Stock Alerts",
    today_orders: "Today's Orders", pending_payments: "Pending Payments",
    // Customer
    customer_name: "Customer Name", phone: "Phone", address: "Address",
    city: "City", district: "District", postal_code: "Postal Code",
    add_customer: "Add Customer", edit_customer: "Edit Customer",
    // Items
    item_code: "Item Code", item_name: "Item Name", category: "Category",
    wholesaler: "Wholesaler", cost_price: "Cost Price", selling_price: "Selling Price",
    stock: "Stock", add_item: "Add Item", active: "Active", inactive: "Inactive",
    // Orders
    order_number: "Order #", order_status: "Order Status", payment_status: "Payment Status",
    courier: "Courier", tracking: "Tracking #", subtotal: "Subtotal",
    delivery_fee: "Delivery Fee", discount: "Discount",
    pending: "Pending", confirmed: "Confirmed", shipped: "Shipped",
    delivered: "Delivered", cancelled: "Cancelled",
    paid: "Paid", partial: "Partial", unpaid: "Unpaid",
    // Payments
    amount: "Amount", payment_method: "Payment Method", payment_date: "Payment Date",
    cod: "Cash on Delivery", bank_transfer: "Bank Transfer",
    verified: "Verified", unverified: "Unverified",
    // Returns
    reason: "Reason", return_status: "Return Status", refund_status: "Refund Status",
    requested: "Requested", approved: "Approved", rejected: "Rejected",
    completed: "Completed",
    // Damages
    quantity: "Quantity", reported_by: "Reported By",
    // Users
    full_name: "Full Name", role: "Role", admin: "Admin", staff: "Staff",
    // Business
    business_name: "Business Name", owner_name: "Owner Name",
    subscription: "Subscription", subscription_status: "Subscription Status",
    // Wholesalers
    wholesale_name: "Wholesaler Name",
    // Couriers
    courier_name: "Courier Name", pricing_type: "Pricing Type",
    flat: "Flat Rate", weight_based: "Weight Based", price: "Price",
    showing: "Showing", of: "of", entries: "entries",
    confirm_delete: "Are you sure you want to delete this?",
    delete_success: "Deleted successfully", save_success: "Saved successfully",
    no_records: "No records found",
  },
  si: {
    // Nav
    dashboard: "උපකරණ පුවරුව", customers: "ගනුදෙනුකරුවන්", items: "භාණ්ඩ",
    orders: "ඇණවුම්", order_items: "ඇණවුම් භාණ්ඩ", payments: "ගෙවීම්",
    returns: "ආපසු", damages: "හානි", users: "පරිශීලකයන්",
    businesses: "ව්‍යාපාර", categories: "කාණ්ඩ", wholesalers: "තොග වෙළෙන්දන්",
    couriers: "කුරියර්", logout: "ඉවත් වන්න", settings: "සැකසීම්",
    // Common
    add: "එකතු කරන්න", edit: "සංස්කරණය", delete: "මකන්න", save: "සුරකින්න",
    cancel: "අවලංගු", search: "සොයන්න", filter: "පෙරහන", export: "අපනයනය",
    print: "මුද්‍රණය", view: "බලන්න", confirm: "තහවුරු කරන්න", back: "ආපසු",
    close: "වසන්න", yes: "ඔව්", no: "නැහැ", actions: "ක්‍රියා", status: "තත්ත්වය",
    created_at: "සාදන ලද", updated_at: "යාවත්කාලීන", notes: "සටහන්",
    select: "තෝරන්න", loading: "පූරණය...", total: "එකතුව", submit: "ඉදිරිපත් කරන්න",
    // Auth
    login: "පිවිසෙන්න", email: "විද්‍යුත් ලිපිනය", password: "මුරපදය",
    remember_me: "මතක තබා ගන්න", forgot_password: "මුරපදය අමතකද?",
    login_title: "නැවත සාදරයෙන් පිළිගනිමු", login_subtitle: "ඔබේ ගිණුමට පිවිසෙන්න",
    // Dashboard
    total_orders: "මුළු ඇණවුම්", total_revenue: "මුළු ආදායම",
    total_customers: "මුළු ගනුදෙනුකරුවන්", total_items: "මුළු භාණ්ඩ",
    recent_orders: "මෑත ඇණවුම්", low_stock: "අඩු තොග ඇඟවීම්",
    today_orders: "අදාළ ඇණවුම්", pending_payments: "අපේක්ෂිත ගෙවීම්",
    // Customer
    customer_name: "ගනුදෙනුකාරයාගේ නම", phone: "දුරකථනය", address: "ලිපිනය",
    city: "නගරය", district: "දිස්ත්‍රික්කය", postal_code: "තැපැල් කේතය",
    add_customer: "ගනුදෙනුකාරයා එකතු කරන්න", edit_customer: "ගනුදෙනුකාරයා සංස්කරණය",
    // Items
    item_code: "භාණ්ඩ කේතය", item_name: "භාණ්ඩ නම", category: "කාණ්ඩය",
    wholesaler: "තොග වෙළෙන්දා", cost_price: "පිරිවැය මිල", selling_price: "විකිණීමේ මිල",
    stock: "තොගය", add_item: "භාණ්ඩ එකතු කරන්න", active: "ක්‍රියාකාරී", inactive: "අක්‍රිය",
    // Orders
    order_number: "ඇණවුම් #", order_status: "ඇණවුම් තත්ත්වය", payment_status: "ගෙවීම් තත්ත්වය",
    courier: "කුරියර්", tracking: "ට්‍රැකිං #", subtotal: "අතරමැදි එකතුව",
    delivery_fee: "බෙදාහැරීමේ ගාස්තු", discount: "වට්ටම",
    pending: "අපේක්ෂිත", confirmed: "තහවුරු", shipped: "යවන ලද",
    delivered: "ලබා දෙන ලද", cancelled: "අවලංගු",
    paid: "ගෙවා ඇත", partial: "අර්ධ", unpaid: "ගෙවා නැත",
    // Payments
    amount: "මුදල", payment_method: "ගෙවීමේ ක්‍රමය", payment_date: "ගෙවීමේ දිනය",
    cod: "බෙදාහැරීමේදී මුදල්", bank_transfer: "බැංකු හුවමාරුව",
    verified: "සත්‍යාපිත", unverified: "සත්‍යාපිත නැත",
    // Returns
    reason: "හේතුව", return_status: "ආපසු තත්ත්වය", refund_status: "ආපසු ගෙවීම",
    requested: "ඉල්ලූ", approved: "අනුමත", rejected: "ප්‍රතික්ෂේප",
    completed: "සම්පූර්ණ",
    // Damages
    quantity: "ප්‍රමාණය", reported_by: "වාර්තා කළේ",
    // Users
    full_name: "සම්පූර්ණ නම", role: "භූමිකාව", admin: "පරිපාලක", staff: "කාර්ය මණ්ඩලය",
    // Business
    business_name: "ව්‍යාපාර නම", owner_name: "හිමිකරු නම",
    subscription: "දායකත්වය", subscription_status: "දායකත්ව තත්ත්වය",
    // Wholesalers
    wholesale_name: "තොග වෙළෙන්දාගේ නම",
    // Couriers
    courier_name: "කුරියර් නම", pricing_type: "මිළ ගණන් වර්ගය",
    flat: "ස්ථාවර", weight_based: "බර මත පදනම්", price: "මිල",
    showing: "පෙන්වීම", of: "ක", entries: "ඇතුළත්",
    confirm_delete: "ඔබට මෙය මැකීමට ඔබ විශ්වාසද?",
    delete_success: "සාර්ථකව මකා දමා ඇත", save_success: "සාර්ථකව සුරකින ලදී",
    no_records: "වාර්තා හමු නොවීය",
  },
  ta: {
    // Nav
    dashboard: "டாஷ்போர்டு", customers: "வாடிக்கையாளர்கள்", items: "பொருட்கள்",
    orders: "ஆர்டர்கள்", order_items: "ஆர்டர் பொருட்கள்", payments: "கொடுப்பனவுகள்",
    returns: "திரும்பல்கள்", damages: "சேதங்கள்", users: "பயனர்கள்",
    businesses: "வணிகங்கள்", categories: "வகைகள்", wholesalers: "மொத்த வியாபாரிகள்",
    couriers: "குரியர்கள்", logout: "வெளியேறு", settings: "அமைப்புகள்",
    // Common
    add: "சேர்", edit: "திருத்து", delete: "நீக்கு", save: "சேமி",
    cancel: "ரத்து", search: "தேடு", filter: "வடிகட்டு", export: "ஏற்றுமதி",
    print: "அச்சிடு", view: "பார்", confirm: "உறுதிப்படுத்து", back: "பின்",
    close: "மூடு", yes: "ஆம்", no: "இல்லை", actions: "செயல்கள்", status: "நிலை",
    created_at: "உருவாக்கப்பட்டது", updated_at: "புதுப்பிக்கப்பட்டது", notes: "குறிப்புகள்",
    select: "தேர்வு", loading: "ஏற்றுகிறது...", total: "மொத்தம்", submit: "சமர்ப்பி",
    // Auth
    login: "உள்நுழைய", email: "மின்னஞ்சல்", password: "கடவுச்சொல்",
    remember_me: "என்னை நினைவில் கொள்", forgot_password: "கடவுச்சொல் மறந்தீர்களா?",
    login_title: "மீண்டும் வரவேற்கிறோம்", login_subtitle: "உங்கள் கணக்கில் உள்நுழையவும்",
    // Dashboard
    total_orders: "மொத்த ஆர்டர்கள்", total_revenue: "மொத்த வருவாய்",
    total_customers: "மொத்த வாடிக்கையாளர்கள்", total_items: "மொத்த பொருட்கள்",
    recent_orders: "சமீபத்திய ஆர்டர்கள்", low_stock: "குறைந்த இருப்பு எச்சரிக்கைகள்",
    today_orders: "இன்றைய ஆர்டர்கள்", pending_payments: "நிலுவை கொடுப்பனவுகள்",
    // Customer
    customer_name: "வாடிக்கையாளர் பெயர்", phone: "தொலைபேசி", address: "முகவரி",
    city: "நகரம்", district: "மாவட்டம்", postal_code: "அஞ்சல் குறியீடு",
    add_customer: "வாடிக்கையாளரை சேர்", edit_customer: "வாடிக்கையாளரை திருத்து",
    // Items
    item_code: "பொருள் குறியீடு", item_name: "பொருள் பெயர்", category: "வகை",
    wholesaler: "மொத்த வியாபாரி", cost_price: "செலவு விலை", selling_price: "விற்பனை விலை",
    stock: "இருப்பு", add_item: "பொருளை சேர்", active: "செயலில்", inactive: "செயலிலில்லை",
    // Orders
    order_number: "ஆர்டர் #", order_status: "ஆர்டர் நிலை", payment_status: "கொடுப்பனவு நிலை",
    courier: "குரியர்", tracking: "ட்ராக்கிங் #", subtotal: "துணைத் தொகை",
    delivery_fee: "டெலிவரி கட்டணம்", discount: "தள்ளுபடி",
    pending: "நிலுவை", confirmed: "உறுதிப்படுத்தப்பட்டது", shipped: "அனுப்பப்பட்டது",
    delivered: "வழங்கப்பட்டது", cancelled: "ரத்து",
    paid: "செலுத்தப்பட்டது", partial: "பகுதி", unpaid: "செலுத்தப்படவில்லை",
    // Payments
    amount: "தொகை", payment_method: "கொடுப்பனவு முறை", payment_date: "கொடுப்பனவு தேதி",
    cod: "டெலிவரியில் பணம்", bank_transfer: "வங்கி பரிமாற்றம்",
    verified: "சரிபார்க்கப்பட்டது", unverified: "சரிபார்க்கப்படவில்லை",
    // Returns
    reason: "காரணம்", return_status: "திரும்பல் நிலை", refund_status: "திரும்ப கொடுப்பனவு",
    requested: "கோரப்பட்டது", approved: "அங்கீகரிக்கப்பட்டது", rejected: "நிராகரிக்கப்பட்டது",
    completed: "முடிந்தது",
    // Damages
    quantity: "அளவு", reported_by: "அறிவித்தவர்",
    // Users
    full_name: "முழு பெயர்", role: "பங்கு", admin: "நிர்வாகி", staff: "ஊழியர்கள்",
    // Business
    business_name: "வணிக பெயர்", owner_name: "உரிமையாளர் பெயர்",
    subscription: "சந்தா", subscription_status: "சந்தா நிலை",
    // Wholesalers
    wholesale_name: "மொத்த வியாபாரி பெயர்",
    // Couriers
    courier_name: "குரியர் பெயர்", pricing_type: "விலை வகை",
    flat: "நிலையான", weight_based: "எடை அடிப்படையில்", price: "விலை",
    showing: "காட்டுகிறது", of: "இல்", entries: "உள்ளீடுகள்",
    confirm_delete: "இதை நீக்க விரும்புகிறீர்களா?",
    delete_success: "வெற்றிகரமாக நீக்கப்பட்டது", save_success: "வெற்றிகரமாக சேமிக்கப்பட்டது",
    no_records: "பதிவுகள் இல்லை",
  }
};

/* ── Language Manager ── */
const Lang = {
  current: localStorage.getItem('saas_lang') || 'en',

  get(key) {
    return TRANSLATIONS[this.current][key] || TRANSLATIONS['en'][key] || key;
  },

  set(lang) {
    this.current = lang;
    localStorage.setItem('saas_lang', lang);
    this.apply();
  },

  apply() {
    document.querySelectorAll('[data-t]').forEach(el => {
      const key = el.getAttribute('data-t');
      if (el.tagName === 'INPUT' && el.placeholder !== undefined) {
        el.placeholder = this.get(key);
      } else {
        el.textContent = this.get(key);
      }
    });
    document.querySelectorAll('[data-t-ph]').forEach(el => {
      el.placeholder = this.get(el.getAttribute('data-t-ph'));
    });
    document.querySelectorAll('[data-t-title]').forEach(el => {
      el.title = this.get(el.getAttribute('data-t-title'));
    });
  }
};

/* ── Sidebar Manager ── */
const Sidebar = {
  el: null,
  overlay: null,
  isCollapsed: false,
  isMobile: false,

  init() {
    this.el = document.querySelector('.sidebar');
    this.overlay = document.querySelector('.sidebar-overlay');
    if (!this.el) return;

    this.isCollapsed = localStorage.getItem('sidebar_collapsed') === 'true';
    this.isMobile = window.innerWidth <= 768;

    if (!this.isMobile && this.isCollapsed) {
      this.el.classList.add('collapsed');
    }

    this.overlay?.addEventListener('click', () => this.closeMobile());
    window.addEventListener('resize', () => this.onResize());
  },

  toggle() {
    this.isMobile = window.innerWidth <= 768;
    if (this.isMobile) {
      this.el.classList.toggle('mobile-open');
      this.overlay?.classList.toggle('active');
    } else {
      this.isCollapsed = !this.isCollapsed;
      this.el.classList.toggle('collapsed', this.isCollapsed);
      localStorage.setItem('sidebar_collapsed', this.isCollapsed);
    }
  },

  closeMobile() {
    this.el.classList.remove('mobile-open');
    this.overlay?.classList.remove('active');
  },

  onResize() {
    const nowMobile = window.innerWidth <= 768;
    if (nowMobile !== this.isMobile) {
      this.isMobile = nowMobile;
      if (!nowMobile) {
        this.el.classList.remove('mobile-open');
        this.overlay?.classList.remove('active');
        if (this.isCollapsed) this.el.classList.add('collapsed');
      } else {
        this.el.classList.remove('collapsed');
      }
    }
  }
};

/* ── Toast Notifications ── */
const Toast = {
  container: null,

  init() {
    this.container = document.getElementById('toast-container');
    if (!this.container) {
      this.container = document.createElement('div');
      this.container.className = 'toast-container';
      this.container.id = 'toast-container';
      document.body.appendChild(this.container);
    }
  },

  show(message, type = 'info', duration = 3000) {
    const icons = { success: '✅', error: '❌', warning: '⚠️', info: 'ℹ️' };
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<span>${icons[type]}</span><span>${message}</span>`;
    this.container.appendChild(toast);
    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(100px)';
      toast.style.transition = '0.3s ease';
      setTimeout(() => toast.remove(), 300);
    }, duration);
  },

  success(msg) { this.show(msg, 'success'); },
  error(msg)   { this.show(msg, 'error'); },
  warning(msg) { this.show(msg, 'warning'); },
  info(msg)    { this.show(msg, 'info'); }
};

/* ── Modal Manager ── */
const Modal = {
  open(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  },

  close(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  },

  closeAll() {
    document.querySelectorAll('.modal-overlay.active').forEach(m => {
      m.classList.remove('active');
    });
    document.body.style.overflow = '';
  }
};

/* ── Dropdown Manager ── */
const Dropdown = {
  init() {
    document.addEventListener('click', e => {
      const trigger = e.target.closest('[data-dropdown]');
      if (trigger) {
        e.stopPropagation();
        const targetId = trigger.getAttribute('data-dropdown');
        const menu = document.getElementById(targetId);
        if (menu) {
          const isOpen = menu.classList.contains('active');
          document.querySelectorAll('.dropdown-menu.active').forEach(m => m.classList.remove('active'));
          if (!isOpen) menu.classList.add('active');
        }
      } else if (!e.target.closest('.dropdown-menu')) {
        document.querySelectorAll('.dropdown-menu.active').forEach(m => m.classList.remove('active'));
      }
    });
  }
};

/* ── Tab Manager ── */
const Tabs = {
  init(container) {
    const root = container || document;
    root.querySelectorAll('[data-tab-btn]').forEach(btn => {
      btn.addEventListener('click', () => {
        const group = btn.getAttribute('data-tab-group');
        const target = btn.getAttribute('data-tab-btn');
        root.querySelectorAll(`[data-tab-group="${group}"]`).forEach(b => b.classList.remove('active'));
        root.querySelectorAll(`[data-tab-content="${group}"]`).forEach(c => c.classList.remove('active'));
        btn.classList.add('active');
        root.querySelector(`[data-tab-content="${group}"][data-tab="${target}"]`)?.classList.add('active');
      });
    });
  }
};

/* ── Confirm Delete ── */
function confirmDelete(callback) {
  const msg = Lang.get('confirm_delete');
  if (window.confirm(msg)) {
    callback();
    Toast.success(Lang.get('delete_success'));
  }
}

/* ── Table Search ── */
function tableSearch(inputId, tableId) {
  const input = document.getElementById(inputId);
  const table = document.getElementById(tableId);
  if (!input || !table) return;
  input.addEventListener('input', () => {
    const q = input.value.toLowerCase();
    table.querySelectorAll('tbody tr').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
}

/* ── Status Badge helper ── */
function statusBadge(status) {
  const map = {
    active: 'success', inactive: 'muted',
    pending: 'warning', confirmed: 'info', shipped: 'info',
    delivered: 'success', cancelled: 'danger',
    paid: 'success', partial: 'warning', unpaid: 'danger',
    verified: 'success', requested: 'warning', approved: 'success',
    rejected: 'danger', completed: 'success', expired: 'danger',
    suspended: 'danger', flat: 'info', weight_based: 'info'
  };
  return `badge-${map[status] || 'muted'}`;
}

/* ── Format Currency ── */
function formatCurrency(amount) {
  return 'Rs. ' + parseFloat(amount || 0).toLocaleString('en-LK', { minimumFractionDigits: 2 });
}

/* ── Format Date ── */
function formatDate(dateStr) {
  if (!dateStr) return '-';
  return new Date(dateStr).toLocaleDateString('en-GB');
}

/* ── Mobile menu button in header ── */
function initHeaderToggle() {
  const btn = document.getElementById('sidebar-toggle');
  if (btn) btn.addEventListener('click', () => Sidebar.toggle());
}

/* ── Language switcher ── */
function initLangSwitcher() {
  document.querySelectorAll('[data-lang]').forEach(el => {
    el.addEventListener('click', () => {
      const lang = el.getAttribute('data-lang');
      Lang.set(lang);
      document.querySelectorAll('[data-lang]').forEach(b => b.classList.toggle('active', b === el));
      Toast.info(`Language changed`);
    });
  });
}

/* ── Active nav link ── */
function setActiveNav() {
  const path = window.location.pathname;
  document.querySelectorAll('.nav-item[data-href]').forEach(item => {
    const href = item.getAttribute('data-href');
    if (path.includes(href)) item.classList.add('active');
  });
}

/* ── DOMContentLoaded ── */
document.addEventListener('DOMContentLoaded', () => {
  Sidebar.init();
  Toast.init();
  Dropdown.init();
  Tabs.init();
  initHeaderToggle();
  initLangSwitcher();
  setActiveNav();
  Lang.apply();

  // Close modals on overlay click
  document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', e => {
      if (e.target === overlay) Modal.closeAll();
    });
  });

  // Close modals on Escape key
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') Modal.closeAll();
  });
});