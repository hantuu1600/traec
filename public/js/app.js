// Preloader
window.addEventListener('load', () => {
  const preloader = document.getElementById('preloader');
  if (!preloader) return;

  const WAIT = 3000;
  const FADE_MS = 500;

  setTimeout(() => {
    preloader.classList.add('opacity-0');

    setTimeout(() => {
      preloader.remove();
    }, FADE_MS);
  }, WAIT);
});

// Login and Registration Form Validation
document.addEventListener('DOMContentLoaded', () => {
  // ---------- Helpers ----------
  const showError = (el, msgEl) => {
    el?.classList.add('input-error');
    msgEl?.classList.remove('hidden');
  };

  const hideError = (el, msgEl) => {
    el?.classList.remove('input-error');
    msgEl?.classList.add('hidden');
  };

  const isEmail = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  const isNumeric = (value) => /^[0-9]+$/.test(value);

  // Phone rule:
  // allow "+62" or "0" or just digits, total digits 10-15
  const isValidPhone = (raw) => {
    const value = raw.trim();
    if (!value) return false;

    const cleaned = value.replace(/\s|-/g, '');
    const digits = cleaned.startsWith('+') ? cleaned.slice(1) : cleaned;

    if (!/^\+?[0-9]+$/.test(cleaned)) return false;
    if (digits.length < 10 || digits.length > 15) return false;

    return true;
  };

  // ---------- LOGIN VALIDATION ----------
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    const loginId = document.getElementById('login_id');
    const password = document.getElementById('password');

    const loginIdError = document.getElementById('loginIdError');
    const passwordError = document.getElementById('passwordError');

    loginForm.addEventListener('submit', (event) => {
      let ok = true;

      // reset
      hideError(loginId, loginIdError);
      hideError(password, passwordError);

      const loginValue = (loginId?.value || '').trim();

      // Email OR numeric NIDN
      const validLogin = isEmail(loginValue) || isNumeric(loginValue);

      if (!loginValue || !validLogin) {
        showError(loginId, loginIdError);
        ok = false;
      }

      if (!password?.value || password.value.length < 8) {
        showError(password, passwordError);
        ok = false;
      }

      if (!ok) event.preventDefault();
    });
  }

  // ---------- REGISTER VALIDATION ----------
  const registerForm = document.getElementById('registerForm');
  if (registerForm) {
    const name = document.getElementById('reg_name');
    const email = document.getElementById('reg_email');
    const pass = document.getElementById('reg_password');
    const nidn = document.getElementById('reg_nidn');
    const prodi = document.getElementById('reg_prodi');
    const faculty = document.getElementById('reg_faculty');
    const position = document.getElementById('reg_position');
    const phone = document.getElementById('reg_phone');

    const errName = document.getElementById('regNameError');
    const errEmail = document.getElementById('regEmailError');
    const errPass = document.getElementById('regPasswordError');
    const errNidn = document.getElementById('regNidnError');
    const errProdi = document.getElementById('regProdiError');
    const errFaculty = document.getElementById('regFacultyError');
    const errPosition = document.getElementById('regPositionError');
    const errPhone = document.getElementById('regPhoneError');

    registerForm.addEventListener('submit', (event) => {
      let ok = true;

      // reset all
      hideError(name, errName);
      hideError(email, errEmail);
      hideError(pass, errPass);
      hideError(nidn, errNidn);
      hideError(prodi, errProdi);
      hideError(faculty, errFaculty);
      hideError(position, errPosition);
      hideError(phone, errPhone);

      const vName = (name?.value || '').trim();
      const vEmail = (email?.value || '').trim();
      const vPass = pass?.value || '';
      const vNidn = (nidn?.value || '').trim();
      const vProdi = (prodi?.value || '').trim();
      const vFaculty = (faculty?.value || '').trim();
      const vPosition = (position?.value || '').trim();
      const vPhone = (phone?.value || '').trim();

      // Name: min 3 chars
      if (!vName || vName.length < 3) {
        showError(name, errName);
        ok = false;
      }

      // Email: valid
      if (!vEmail || !isEmail(vEmail)) {
        showError(email, errEmail);
        ok = false;
      }

      // Password: min 8 chars
      if (!vPass || vPass.length < 8) {
        showError(pass, errPass);
        ok = false;
      }

      // NIDN: numeric min 6 digits (adjust if you want exactly 10)
      if (!vNidn || !isNumeric(vNidn) || vNidn.length < 6) {
        showError(nidn, errNidn);
        ok = false;
      }

      // Prodi/Faculty/Position: must choose (not empty)
      if (!vProdi) {
        showError(prodi, errProdi);
        ok = false;
      }

      if (!vFaculty) {
        showError(faculty, errFaculty);
        ok = false;
      }

      if (!vPosition) {
        showError(position, errPosition);
        ok = false;
      }

      // Phone: 10–15 digits, may start with +62
      if (!vPhone || !isValidPhone(vPhone)) {
        showError(phone, errPhone);
        ok = false;
      }

      if (!ok) event.preventDefault();
    });
  }
});
