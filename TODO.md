# StreamX24 Theme Fixes - TODO List

## Phase 1: Critical Core Fixes
- [x] 1. Fix functions.php - Remove HTML output, add proper theme setup
- [x] 2. Fix header.php - Add wp_head(), fix menu location
- [x] 3. Fix footer.php - Add wp_footer(), fix year dynamically
- [x] 4. Fix index.php - Clean up duplicate code

## Phase 2: Template Files
- [x] 5. Fix single.php - Remove duplicate get_header(), add security
- [x] 6. Fix page.php - Clean up code structure
- [x] 7. Fix template-custom.php - Replace hardcoded .html links
- [x] 8. Fix template-blog.php - Replace hardcoded .html links

## Phase 3: Security & Standards
- [x] 9. Add escaping to all dynamic outputs (XSS prevention)
- [x] 10. Add security nonces to forms
- [x] 11. Implement proper text domain for translations
- [x] 12. Fix menu location registration names

## Phase 4: JavaScript & Enqueueing
- [x] 13. Fix Google Analytics enqueuing
- [x] 14. Properly enqueue main.js with dependencies
- [x] 15. Move inline JS to external file

## Phase 5: Cleanup & Testing
- [x] 16. Remove duplicate code blocks (header-inner.php deleted)
- [x] 17. Verify all files are WordPress compliant
- [ ] 18. Test theme activation

