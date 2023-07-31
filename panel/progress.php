<div class="progress">
            <span class="bar"></span>
        </div>
        <script>
            const elem = document.body;
            const bar = document.querySelector('.bar');
            const updateBar = () => {
                let scrollPos = (window.scrollY/(elem.scrollHeight-window.innerHeight))*100;
                bar.style.width = `${scrollPos}%`;
                requestAnimationFrame(updateBar);
            };
            updateBar();
        </script>