<div class="notes-wrapper">
  <div class="notes-header">
    <h2>📝 Bloc-notes</h2>
    <span class="notes-status" id="notesStatus"></span>
  </div>
  <textarea id="notesArea" class="notes-area" placeholder="Écris tes notes ici..."></textarea>
</div>

<style>
  .notes-wrapper {
    font-family: 'Segoe UI', system-ui, sans-serif;
    background: var(--surface, #1a1d27);
    border: 1px solid var(--border, #2a2d3e);
    border-radius: 14px;
    padding: 1.2rem;
    width: 100%;
    max-width: 420px;
    display: flex;
    flex-direction: column;
  }

  .notes-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: .8rem;
  }

  .notes-header h2 {
    font-size: 1.1rem;
    color: var(--text, #e2e8f0);
  }

  .notes-status {
    font-size: .75rem;
    color: var(--muted, #64748b);
    opacity: 0;
    transition: opacity .2s;
  }
  .notes-status.show { opacity: 1; }

  .notes-area {
    width: 100%;
    min-height: 280px;
    resize: vertical;
    background: var(--bg, #0f1117);
    border: 1px solid var(--border, #2a2d3e);
    border-radius: 10px;
    color: var(--text, #e2e8f0);
    font-family: inherit;
    font-size: .9rem;
    line-height: 1.5;
    padding: .8rem;
    outline: none;
    transition: border-color .15s;
  }
  .notes-area:focus {
    border-color: var(--accent, #6366f1);
  }
</style>

<script>
(function () {
  const STORAGE_KEY = 'dashboard_notes';
  const area   = document.getElementById('notesArea');
  const status = document.getElementById('notesStatus');
  let saveTimeout;

  // Charger les notes sauvegardées (localStorage le temps de brancher le PHP si besoin)
  area.value = localStorage.getItem(STORAGE_KEY) || '';

  area.addEventListener('input', () => {
    clearTimeout(saveTimeout);
    status.textContent = 'Sauvegarde...';
    status.classList.add('show');

    saveTimeout = setTimeout(() => {
      localStorage.setItem(STORAGE_KEY, area.value);
      status.textContent = 'Sauvegardé ✓';
      setTimeout(() => status.classList.remove('show'), 1500);
    }, 600);
  });
})();
</script>
