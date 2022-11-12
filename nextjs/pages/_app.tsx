import '../styles/globals.css'
import Layout from "../layout/layout";
import type { AppProps } from 'next/app'

/**
 * レイアウトの切り替え
 * @param Component
 * @param pageProps
 * @constructor
 * 参考: https://imatomix.com/imatomix/notes/1591872503000
 */
export default function App({ Component, pageProps }: AppProps) {
    switch (pageProps.layout) {
        case "layout":{
            return (
                <Layout>
                    <Component {...pageProps} />
                </Layout>
            )
        }
        default: {
            return (
                <Component {...pageProps} />
            )
        }
    }
}
