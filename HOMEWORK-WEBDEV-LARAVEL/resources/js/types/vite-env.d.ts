/// <reference types="vite/client" />

import Echo from "laravel-echo";

declare global {
    interface Window {
        Echo: Echo;
    }
}
