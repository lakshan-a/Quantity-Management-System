<?php
// ============================================
// File: includes/footer.php
// Description: Global footer
// ============================================
?>
    </div> <!-- Close main-content from header? Actually we need to structure properly -->
    <script>
        // Global functions
        function showNotification(message, type = 'success') {
            const notif = document.createElement('div');
            notif.className = `fixed top-20 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} transition-all transform translate-x-full`;
            notif.innerHTML = message;
            document.body.appendChild(notif);
            setTimeout(() => notif.classList.remove('translate-x-full'), 100);
            setTimeout(() => notif.remove(), 3000);
        }
        
        // Confirm dialog
        function confirmAction(message, callback) {
            if(confirm(message)) callback();
        }
    </script>
</body>
</html>