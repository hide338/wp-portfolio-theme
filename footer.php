  </div>
  <!-- /.container -->
  <div class="l-container">
    <?php if(!(is_home() || is_front_page())): ?>
      <?php breadcrumb(); ?>
    <?php endif; ?>
  </div>
  <footer id="colophon" class="l-footer">
    <div class="l-footer-info l-container">
      <p>&copy; 2024 Toshihide Portfolio</p>
    </div><!-- .site-info -->
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>
</html>