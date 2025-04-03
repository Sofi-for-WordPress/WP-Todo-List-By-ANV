import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.tsx'

const todoKickTaskListPage = document.getElementById('todo-kick-task-list-page');

if (todoKickTaskListPage) {
    createRoot(todoKickTaskListPage).render(
        <StrictMode>
            <App></App>
        </StrictMode>
    )
}
