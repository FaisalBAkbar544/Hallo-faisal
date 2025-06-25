    </div> <!-- end of #mainContent -->

    <!-- footer -->
    <div class="footer">
        <i>Copyright &copy; Personal Website All Rights Reserved <br>
        This Website was Developed by <a href="http://localhost/personalweb_faisalakbar">faisal akbar</a>
        </i>
    </div>
    <!-- footer end -->

    <script src="../assets/js/jquery.slim.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- Sidebar toggle script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("mySidebar");
            const body = document.body;
            if (sidebar.style.left === "0px") {
                sidebar.style.left = "-250px";
                body.classList.remove("sidebar-open");
            } else {
                sidebar.style.left = "0px";
                body.classList.add("sidebar-open");
            }
        }
            document.addEventListener('DOMContentLoaded', () => {
        const toggleSwitch = document.getElementById('toggle-switch');

        // Terapkan tema tersimpan dari localStorage
        const savedTheme = localStorage.getItem('theme') || 'dark';
        document.body.classList.add(`${savedTheme}-theme`);
        if (toggleSwitch) {
            toggleSwitch.checked = savedTheme === 'dark';

            // Event listener untuk toggle
            toggleSwitch.addEventListener('change', () => {
                const isDark = document.body.classList.contains('dark-theme');

                if (isDark) {
                    document.body.classList.remove('dark-theme');
                    document.body.classList.add('light-theme');
                } else {
                    document.body.classList.remove('light-theme');
                    document.body.classList.add('dark-theme');
                }

                localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
            });
        }
    });

    </script>
</body>
</html>
