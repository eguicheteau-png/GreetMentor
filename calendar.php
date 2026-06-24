<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calendrier</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg:       #FAFBFC;
      --surface:  #2A4E75;
      --border:   #7FA3C7;
      --accent:   #2A4E75;
      --accent2:  #7FA3C7;
      --text:     #000;
      --muted:    #FAFBFC;
      --danger:   #f43f5e;
      --today-bg: rgba(99,102,241,0.15);
      --radius:   14px;
    }

  .calendar-wrapper {
    font-family: 'Segoe UI', system-ui, sans-serif;
    color: var(--text);
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    padding: 1rem;
}

    /* ── Header ── */
    .header {
      width: 100%;
      max-width: 420px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
    }
    .header h1 {
      font-size: 1rem;
      font-weight: 700;
      letter-spacing: -0.5px;
      color: var(--accent2);
    }
    .nav-btns { display: flex; gap: .5rem; }
    .nav-btns button, .btn-add {
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--text);
      border-radius: 8px;
      padding: .25rem .6rem;
      cursor: pointer;
      font-size: .75rem;
      transition: background .15s, border-color .15s;
    }
    .nav-btns button:hover { background: var(--border); }
    .btn-add {
      background: var(--accent);
      border-color: var(--accent);
      font-weight: 600;
      padding: .25rem .8rem;
    }
    .btn-add:hover { background: var(--accent2); border-color: var(--accent2); }

    /* ── Month label ── */
    #monthLabel {
      font-size: .85rem;
      font-weight: 600;
      min-width: 110px;
      text-align: center;
    }

    /* ── Calendar grid ── */
    .calendar {
      width: 100%;
      max-width: 420px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      overflow: hidden;
    }
    .day-names {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      border-bottom: 1px solid var(--border);
    }
    .day-names span {
      padding: .6rem 0;
      text-align: center;
      font-size: .75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: var(--muted);
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
    }
    .cell {
      min-height: 70px;
      border-right: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      padding: .3rem .3rem;
      cursor: pointer;
      transition: background .12s;
      position: relative;
    }
    .cell:nth-child(7n) { border-right: none; }
    .cell:hover { background: #7FA3C7; }
    .cell.other-month .cell-day { color: var(--muted); }
    .cell.today { background: var(--today-bg); }
    .cell-day {
      font-size: .8rem;
      font-weight: 600;
      margin-bottom: .1rem;
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }
    .cell.today .cell-day {
      background: var(--accent);
      color: #fff;
    }
    .event-chip {
      font-size: .7rem;
      font-weight: 500;
      padding: 1px 4px;
      border-radius: 4px;
      margin-bottom: 1px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      cursor: pointer;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 4px;
    }
    .event-chip .chip-delete {
      flex-shrink: 0;
      opacity: 0;
      font-size: .65rem;
      transition: opacity .1s;
      cursor: pointer;
    }
    .event-chip:hover .chip-delete { opacity: 1; }
    .more-events {
      font-size: .65rem;
      color: var(--muted);
      padding: 1px 4px;
    }

    /* ── Modal ── */
    .overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,.6);
      z-index: 100;
      align-items: center;
      justify-content: center;
    }
    .overlay.open { display: flex; }
    .modal {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      width: 100%;
      max-width: 420px;
      padding: 1.8rem;
      position: relative;
      animation: slideUp .2s ease;
    }
    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to   { transform: translateY(0);    opacity: 1; }
    }
    .modal h2 { font-size: 1.1rem; margin-bottom: 1.2rem; }
    .modal label { font-size: .82rem; color: var(--muted); display: block; margin-bottom: .25rem; }
    .modal input, .modal textarea {
      width: 100%;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: 8px;
      color: var(--text);
      padding: .55rem .75rem;
      font-size: .9rem;
      margin-bottom: 1rem;
      outline: none;
      transition: border-color .15s;
    }
    .modal input:focus, .modal textarea:focus { border-color: var(--accent); }
    .modal textarea { resize: vertical; min-height: 70px; }

    .color-row { display: flex; gap: .5rem; margin-bottom: 1rem; flex-wrap: wrap; }
    .color-swatch {
      width: 26px; height: 26px;
      border-radius: 50%;
      cursor: pointer;
      border: 2px solid transparent;
      transition: border-color .1s, transform .1s;
    }
    .color-swatch.selected, .color-swatch:hover { border-color: #fff; transform: scale(1.15); }

    .modal-actions { display: flex; gap: .75rem; justify-content: flex-end; }
    .btn-cancel {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
      border-radius: 8px;
      padding: .5rem 1.1rem;
      cursor: pointer;
      font-size: .9rem;
    }
    .btn-save {
      background: var(--accent);
      border: none;
      color: #fff;
      border-radius: 8px;
      padding: .5rem 1.3rem;
      cursor: pointer;
      font-size: .9rem;
      font-weight: 600;
    }
    .btn-save:hover { background: var(--accent2); }

    .close-modal {
      position: absolute;
      top: .9rem; right: 1rem;
      background: none; border: none;
      color: var(--muted); font-size: 1.3rem;
      cursor: pointer; line-height: 1;
    }

    /* ── Toast ── */
    .toast {
      position: fixed;
      bottom: 1.5rem; right: 1.5rem;
      background: #1e293b;
      border: 1px solid var(--accent);
      color: var(--text);
      padding: .75rem 1.2rem;
      border-radius: 10px;
      font-size: .9rem;
      opacity: 0;
      transform: translateY(10px);
      transition: opacity .25s, transform .25s;
      z-index: 200;
      pointer-events: none;
    }
    .toast.show { opacity: 1; transform: translateY(0); }

    @media (max-width: 600px) {
      .cell { min-height: 64px; padding: .3rem .2rem; }
      .event-chip { font-size: .62rem; }
    }
  </style>
</head>
<body>

<div class="calendar-wrapper">
<!-- ── Header ── -->
<div class="header">
  <h1>📅 Calendrier</h1>
  <div class="nav-btns">
    <button id="prevBtn">‹</button>
    <span id="monthLabel"></span>
    <button id="nextBtn">›</button>
  </div>
  <button class="btn-add" id="addBtn">+ Ajouter</button>
</div>

<!-- ── Calendar ── -->
<div class="calendar">
  <div class="day-names">
    <span>Lun</span><span>Mar</span><span>Mer</span>
    <span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
  </div>
  <div class="grid" id="grid"></div>
</div>

<!-- ── Modal ── -->
<div class="overlay" id="overlay">
  <div class="modal">
    <button class="close-modal" id="closeModal">×</button>
    <h2 id="modalTitle">Nouvel événement</h2>

    <label>Titre *</label>
    <input type="text" id="evtTitle" placeholder="Réunion, anniversaire…" />

    <label>Date *</label>
    <input type="date" id="evtDate" />

    <label>Note</label>
    <textarea id="evtNote" placeholder="Description optionnelle…"></textarea>

    <label>Couleur</label>
    <div class="color-row" id="colorRow"></div>

    <div class="modal-actions">
      <button class="btn-cancel" id="cancelBtn">Annuler</button>
      <button class="btn-save"   id="saveBtn">Enregistrer</button>
    </div>
  </div>
</div>

<!-- ── Toast ── -->
<div class="toast" id="toast"></div>
</div>
<script>
/* ─── Config ─────────────────────────────────────── */
const API = 'api.php';

const COLORS = [
  '#6366f1','#ec4899','#f59e0b','#10b981',
  '#3b82f6','#ef4444','#8b5cf6','#14b8a6'
];

/* ─── State ───────────────────────────────────────── */
let events     = [];
let currentYear, currentMonth;
let selectedColor = COLORS[0];

/* ─── Init ────────────────────────────────────────── */
const now = new Date();
currentYear  = now.getFullYear();
currentMonth = now.getMonth();

buildColorSwatches();
fetchEvents();

/* ─── Color swatches ──────────────────────────────── */
function buildColorSwatches() {
  const row = document.getElementById('colorRow');
  COLORS.forEach(c => {
    const s = document.createElement('div');
    s.className = 'color-swatch' + (c === selectedColor ? ' selected' : '');
    s.style.background = c;
    s.dataset.color = c;
    s.addEventListener('click', () => {
      selectedColor = c;
      row.querySelectorAll('.color-swatch').forEach(el => el.classList.remove('selected'));
      s.classList.add('selected');
    });
    row.appendChild(s);
  });
}

/* ─── API calls ───────────────────────────────────── */
async function fetchEvents() {
  try {
    const res = await fetch(API);
    const data = await res.json();
    events = data.events || [];
    renderCalendar();
  } catch (e) {
    // Pas de serveur PHP (prévisualisation) : démo locale
    events = [];
    renderCalendar();
  }
}

async function saveEvent(evt) {
  try {
    const res = await fetch(API, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(evt)
    });
    const data = await res.json();
    if (data.success) {
      events.push(data.event);
      renderCalendar();
      showToast('Événement ajouté ✓');
    }
  } catch (e) {
    // Mode démo sans serveur
    const local = { ...evt, id: 'local_' + Date.now() };
    events.push(local);
    renderCalendar();
    showToast('Événement ajouté (mode local) ✓');
  }
}

async function deleteEvent(id) {
  try {
    await fetch(`${API}?id=${encodeURIComponent(id)}`, { method: 'DELETE' });
  } catch (e) { /* mode local */ }
  events = events.filter(e => e.id !== id);
  renderCalendar();
  showToast('Événement supprimé');
}

/* ─── Calendar render ─────────────────────────────── */
function renderCalendar() {
  const label = document.getElementById('monthLabel');
  label.textContent = new Date(currentYear, currentMonth, 1)
    .toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });

  const grid = document.getElementById('grid');
  grid.innerHTML = '';

  const firstDay = new Date(currentYear, currentMonth, 1);
  // Monday-based: 0=Mon … 6=Sun
  let startOffset = (firstDay.getDay() + 6) % 7;
  const daysInMonth   = new Date(currentYear, currentMonth + 1, 0).getDate();
  const daysInPrevMon = new Date(currentYear, currentMonth, 0).getDate();

  const todayStr = toDateStr(now);

  for (let i = 0; i < 42; i++) {
    let day, date, otherMonth = false;
    if (i < startOffset) {
      day = daysInPrevMon - startOffset + i + 1;
      date = new Date(currentYear, currentMonth - 1, day);
      otherMonth = true;
    } else if (i - startOffset < daysInMonth) {
      day = i - startOffset + 1;
      date = new Date(currentYear, currentMonth, day);
    } else {
      day = i - startOffset - daysInMonth + 1;
      date = new Date(currentYear, currentMonth + 1, day);
      otherMonth = true;
    }

    const dateStr   = toDateStr(date);
    const isToday   = dateStr === todayStr;
    const dayEvents = events.filter(e => e.date === dateStr);

    const cell = document.createElement('div');
    cell.className = 'cell' + (otherMonth ? ' other-month' : '') + (isToday ? ' today' : '');
    cell.addEventListener('click', () => openModal(dateStr));

    const dayNum = document.createElement('div');
    dayNum.className = 'cell-day';
    dayNum.textContent = day;
    cell.appendChild(dayNum);

    const MAX = 3;
    dayEvents.slice(0, MAX).forEach(ev => {
      const chip = document.createElement('div');
      chip.className = 'event-chip';
      chip.style.background = ev.color || '#6366f1';
      chip.title = ev.note || ev.title;

      const label = document.createElement('span');
      label.style.overflow = 'hidden';
      label.style.textOverflow = 'ellipsis';
      label.textContent = ev.title;

      const del = document.createElement('span');
      del.className = 'chip-delete';
      del.textContent = '✕';
      del.title = 'Supprimer';
      del.addEventListener('click', e => {
        e.stopPropagation();
        deleteEvent(ev.id);
      });

      chip.appendChild(label);
      chip.appendChild(del);
      cell.appendChild(chip);
    });

    if (dayEvents.length > MAX) {
      const more = document.createElement('div');
      more.className = 'more-events';
      more.textContent = `+${dayEvents.length - MAX} autre(s)`;
      cell.appendChild(more);
    }

    grid.appendChild(cell);
  }
}

/* ─── Modal ───────────────────────────────────────── */
function openModal(dateStr = '') {
  document.getElementById('evtTitle').value = '';
  document.getElementById('evtDate').value  = dateStr;
  document.getElementById('evtNote').value  = '';
  selectedColor = COLORS[0];
  document.querySelectorAll('.color-swatch').forEach((s, i) => {
    s.classList.toggle('selected', i === 0);
  });
  document.getElementById('modalTitle').textContent = dateStr
    ? 'Nouvel événement — ' + new Date(dateStr + 'T12:00').toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' })
    : 'Nouvel événement';
  document.getElementById('overlay').classList.add('open');
  document.getElementById('evtTitle').focus();
}

function closeModal() {
  document.getElementById('overlay').classList.remove('open');
}

document.getElementById('addBtn').addEventListener('click', () => openModal());
document.getElementById('cancelBtn').addEventListener('click', closeModal);
document.getElementById('closeModal').addEventListener('click', closeModal);
document.getElementById('overlay').addEventListener('click', e => {
  if (e.target === document.getElementById('overlay')) closeModal();
});

document.getElementById('saveBtn').addEventListener('click', async () => {
  const title = document.getElementById('evtTitle').value.trim();
  const date  = document.getElementById('evtDate').value;
  if (!title || !date) { showToast('Titre et date obligatoires', true); return; }

  await saveEvent({
    title,
    date,
    color: selectedColor,
    note: document.getElementById('evtNote').value.trim()
  });
  closeModal();
});

/* ─── Navigation ──────────────────────────────────── */
document.getElementById('prevBtn').addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) { currentMonth = 11; currentYear--; }
  renderCalendar();
});
document.getElementById('nextBtn').addEventListener('click', () => {
  currentMonth++;
  if (currentMonth > 11) { currentMonth = 0; currentYear++; }
  renderCalendar();
});

/* ─── Keyboard shortcut ───────────────────────────── */
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeModal();
  if (e.key === 'Enter' && document.getElementById('overlay').classList.contains('open')) {
    document.getElementById('saveBtn').click();
  }
});

/* ─── Helpers ─────────────────────────────────────── */
function toDateStr(d) {
  return d.toISOString().slice(0, 10);
}

function showToast(msg, isError = false) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.style.borderColor = isError ? '#f43f5e' : 'var(--accent)';
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2500);
}
</script>
</body>
</html>
