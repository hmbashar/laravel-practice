<!-- Raw Response Display Component -->
<div class="response-section">
    <h2 class="section-title">
        📡 API Response Data
    </h2>
    
    <div class="tabs">
        <button class="tab active" onclick="showTab(event, 'formatted')">Formatted Data</button>
        <button class="tab" onclick="showTab(event, 'raw')">Raw Response</button>
        <button class="tab" onclick="showTab(event, 'code')">Laravel Code</button>
    </div>

    <div id="formatted" class="tab-content active">
        <h3 style="margin-bottom: 16px; color: var(--text-primary);">Processed Data</h3>
        <p style="color: var(--text-secondary); margin-bottom: 16px;">
            {{ $description ?? 'The API response was processed for better display.' }}
        </p>
        <div class="code-block">{{ $codeExample ?? '// Process the data as needed' }}</div>
    </div>

    <div id="raw" class="tab-content">
        <h3 style="margin-bottom: 16px; color: var(--text-primary);">Raw JSON Response</h3>
        <div class="endpoint-url">{{ $endpoint ?? 'API Endpoint' }}</div>
        <div class="json-block" id="raw-response">{!! $formattedJson !!}</div>
        <button class="copy-button" onclick="copyToClipboard('raw-response')">
            📋 Copy JSON
        </button>
    </div>

    <div id="code" class="tab-content">
        <h3 style="margin-bottom: 16px; color: var(--text-primary);">Laravel Code Example</h3>
        <div class="code-block" id="laravel-code">{{ $laravelCode ?? '// Laravel code example' }}</div>
        <button class="copy-button" onclick="copyToClipboard('laravel-code')">
            📋 Copy Code
        </button>
    </div>
</div>

<style>
/* Default theme variables if not provided by parent */
:root {
    --primary-color: #2563eb;
    --primary-dark: #1d4ed8;
    --text-primary: #111827;
    --text-secondary: #374151;
    --text-muted: #6b7280;
    --bg-primary: #ffffff;
    --bg-secondary: #f9fafb;
    --bg-tertiary: #f3f4f6;
    --border-color: #e5e7eb;
}

.response-section {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 32px;
    margin-top: 40px;
    text-align: left; /* Ensure text is left aligned even if parent is centered */
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    border-bottom: 1px solid var(--border-color);
}

.tab {
    padding: 12px 20px;
    background: transparent;
    border: none;
    color: var(--text-muted);
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    border-bottom: 2px solid transparent;
    width: auto; /* Reset any global button width */
    border-radius: 0; /* Reset any global border-radius */
    box-shadow: none; /* Reset any global box-shadow */
}

.tab.active {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
    background: transparent; /* Ensure no background on active tab */
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.endpoint-url {
    background: var(--bg-tertiary);
    padding: 12px 16px;
    border-radius: 6px;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    font-size: 0.875rem;
    color: var(--text-primary);
    border: 1px solid var(--border-color);
    margin-bottom: 24px;
    word-break: break-all;
}

.code-block, .json-block {
    background: #1f2937;
    color: #f9fafb;
    padding: 20px;
    border-radius: 8px;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    font-size: 0.875rem;
    line-height: 1.6;
    overflow-x: auto;
    white-space: pre;
    border: 1px solid #374151;
}

.json-block {
    max-height: 500px;
    overflow-y: auto;
}

.json-key { color: #60a5fa; }
.json-string { color: #86efac; }
.json-number { color: #fbbf24; }
.json-boolean { color: #c084fc; }
.json-null { color: #f87171; }
.json-bracket { color: #d1d5db; }

.copy-button {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s ease;
    margin-top: 16px;
}

.copy-button:hover {
    background: var(--primary-dark);
}
</style>

<script>
if (typeof showTab !== 'function') {
    function showTab(event, tabName) {
        const section = event.target.closest('.response-section');
        
        // Hide all tab contents in this section
        section.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        
        // Remove active class from all tabs in this section
        section.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Show selected tab content
        section.querySelector('#' + tabName).classList.add('active');
        
        // Add active class to clicked tab
        event.target.classList.add('active');
    }
}

if (typeof copyToClipboard !== 'function') {
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const text = element.textContent;
        
        navigator.clipboard.writeText(text).then(() => {
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = '✓ Copied!';
            
            setTimeout(() => {
                button.textContent = originalText;
            }, 2000);
        });
    }
}
</script>
