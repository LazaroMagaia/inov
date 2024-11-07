
    <!-- JavaScript for Dropdown Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    <script>
        // Toggle functionality for mobile menu
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('hidden');
        });

       /* // Modal functionality
        const openModalBtn = document.getElementById('open-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const modal = document.getElementById('modal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Optional: Close modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });*/

        // Example: Set "Home" as active menu item
     
        const links = document.querySelectorAll('aside nav a');

        // Obtém a URL atual
        const currentPath = window.location.pathname;

        // Itera sobre todos os links
        links.forEach(link => {
            // Verifica se o href do link corresponde à URL atual
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('primary-active');
            } else {
                link.classList.remove('primary-active');
            }
        });
    </script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pagingType": "simple_numbers", // Paginação simples com números
            "language": {
                "search": "Buscar:",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas"
            },
            "order": [[0, 'desc']] // Ordena pela coluna `id` (índice 0) em ordem decrescente
        });
    });
</script>



<script>
document.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll('.modal');
    const openModalButtons = document.querySelectorAll('[data-modal-target]');
    const closeModalButtons = document.querySelectorAll('.modal-close');

    const showModal = (modal) => {
        modal.classList.remove('opacity-0', 'pointer-events-none', 'scale-90');
        modal.classList.add('opacity-100', 'scale-100');
    };

    const hideModal = (modal) => {
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'pointer-events-none', 'scale-90');
    };

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetModal = document.querySelector(button.getAttribute('data-modal-target'));
            showModal(targetModal);
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            hideModal(modal);
        });
    });

    window.addEventListener('click', (event) => {
        if (event.target.classList.contains('modal')) {
            hideModal(event.target);
        }
    });
});
</script>

</body>
</html>
