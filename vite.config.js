import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'routes/**',
                'public/design/**',//260306ホットリロード対象として、.htmlデザイン環境を追加
            ]
            // true  //260306デフォルトはtrueのみ。配列化して適用対象を明記
            ,
        }),
    ],
});
