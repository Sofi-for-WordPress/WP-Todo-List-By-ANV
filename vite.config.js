import {defineConfig} from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig({
    plugins: [react()],
    server: {
        port: 5173, // Vite dev server port
        strictPort: true,
        proxy: {
            '/wp-admin': 'http://localhost:10008', // WordPress dev server
            '/wp-json': 'http://localhost:10008'   // WordPress REST API
        }
    },
    build: {
        outDir: 'dist', // compiled files folder
        emptyOutDir: true
    }
})
