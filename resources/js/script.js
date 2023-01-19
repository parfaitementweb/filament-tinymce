import tinymce from 'tinymce/tinymce'

/* Default icons are required. After that, import custom icons if applicable */
import 'tinymce/icons/default';

/* Required TinyMCE components */
import 'tinymce/themes/silver';
import 'tinymce/models/dom';

/* Import plugins */
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/table';
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/autoresize';
import 'tinymce/plugins/codesample';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/importcss';
import 'tinymce/plugins/quickbars';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/media';
import 'tinymce/plugins/wordcount';

document.addEventListener("alpine:init", () => {

    Alpine.data("filamenttinymce", ({state, css, id, body_class, content_style}) => ({
        id: id,
        css: css,
        body_class: body_class,
        content_style: content_style,
        state: state,
        updatedAt: Date.now(), // force Alpine to rerender on selection change
        fullScreenMode: false,
        focused: false,
        init() {
            const _this = this;
            tinymce.init({
                target: this.$refs.element,
                plugins: 'wordcount quickbars table link image media advlist lists anchor autolink autoresize code codesample fullscreen importcss',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist | link emoticons | codesample | fullscreen',
                promotion: false,
                branding: false,
                skin_url: (window.matchMedia('(prefers-color-scheme: dark)').matches ? '/vendor/filament-tinymce/skins/ui/oxide-dark' : '/vendor/filament-tinymce/skins/ui/oxide'),
                body_class: this.body_class,
                content_style: this.content_style,
                content_css: this.css,
                quickbars_insert_toolbar: 'quicktable image media codesample',
                quickbars_selection_toolbar: 'bold italic underline codesample | bullist numlist | blockquote quicklink',
                contextmenu: 'undo redo | inserttable | cell row column deletetable wordcount',
                // content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? '/vendor/filament-tinymce/skins/content/dark/content.min.css' : '/vendor/filament-tinymce/skins/content/default/content.min.css'),
                codesample_languages: [
                    { text: 'PHP', value: 'php' },
                    { text: 'HTML/XML', value: 'markup' },
                    { text: 'JS', value: 'javascript' },
                    { text: 'CSS', value: 'css' },
                    { text: 'Blade', value: 'blade' },
                    { text: 'Vue', value: 'vue' },
                    { text: 'Bash', value: 'bash' },
                    { text: 'Ruby', value: 'ruby' },
                    { text: 'Python', value: 'python' },
                    { text: 'Java', value: 'java' },
                ],
                setup: (editor) => {
                    editor.on('init', (e) => {
                        editor.setContent(state.initialValue || '');
                        _this.updatedAt = Date.now()
                    });
                    editor.on('blur', (e) => {
                        _this.updatedAt = Date.now()
                        _this.$refs.textarea.dispatchEvent(new Event("change"));
                    });
                    editor.on('Change', (e) => {
                        _this.$refs.textarea.value = editor.getContent()
                        _this.updatedAt = Date.now()
                        _this.$refs.textarea.dispatchEvent(new Event("input"));
                    });
                }
            });
        }
    }));
});
