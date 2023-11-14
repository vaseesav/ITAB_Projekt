        // Function to set the active class based on the page title
        function setActiveClassBasedOnTitle() {
            var navItems = document.querySelectorAll('.nav a');
            var pageTitle = document.title;

            navItems.forEach(function(item) {
                // Check if the item's text is in the page title
                if (pageTitle.includes(item.textContent)) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Call the function when the script loads
        setActiveClassBasedOnTitle();