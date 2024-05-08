    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/dist/js/demo.min.js?1684106062') }}" defer></script>

    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                var passwordField = $("#passwordField");
                var type = passwordField.attr("type");
                if (type === "password") {
                    passwordField.attr("type", "text");
                } else {
                    passwordField.attr("type", "password");
                }
            });
        });

        $(document).ready(function() {
            $(".toggle-confpassword").click(function() {
                var passwordField = $("#passwordConfField");
                var type = passwordField.attr("type");
                if (type === "password") {
                    passwordField.attr("type", "text");
                } else {
                    passwordField.attr("type", "password");
                }
            });
        });

    </script>
    </body>

    </html>
