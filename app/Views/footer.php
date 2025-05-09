<?php
// CI4 doesn't use the defined('BASEPATH') check - that was a CI3 convention
?>

      </main>

      <footer class="bg-primary text-white mt-5">
        <div class="container py-4">
          <div class="row">
            <div class="col-12">
              <h5>Sistem Multimedia</h5>
              <figure class="border-start border-secondary ps-3 my-3">
                <blockquote class="blockquote">
                  <p class="text-light opacity-75">Esse Est Percipi.</p>
                </blockquote>
              </figure>
            </div>
          </div>
        </div>
        <div class="bg-primary bg-opacity-75 py-3">
          <div class="container">
            <small>
              Copyright © <?= date("Y"); ?> Gunadarma University. All rights reserved.
            </small>
          </div>
        </div>
      </footer>

      <style>
        body {
          display: flex;
          min-height: 100vh;
          flex-direction: column;
        }

        main {
          flex: 1 0 auto;
        }
      </style>
    </body>
</html>
