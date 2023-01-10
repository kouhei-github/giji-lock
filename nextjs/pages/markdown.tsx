import "@uiw/react-md-editor/markdown-editor.css";
import "@uiw/react-markdown-preview/markdown.css";
import dynamic from "next/dynamic";
import { useState } from "react";

/**
 * レイアウトの切り替え
 * 参考: https://imatomix.com/imatomix/notes/1591872503000
 */
export const getServerSideProps = async () => ({
    props: {
        layout: "layout" // 複数のレイアウトを切り替えたいときは 'MainLayout' などの文字列を用いる
    }
})

const MDEditor = dynamic(
    () => import("@uiw/react-md-editor"),
    { ssr: false }
);

function Markdown() {
    const [value, setMarkdown] = useState<string>("**Hello world!!!**");
    const updateMarkdown = (value: string|undefined): void => {
        if(typeof value === "undefined") return
        setMarkdown(value)
    }
    return (
        <div className={""}>
            <MDEditor value={value} onChange={(value) => updateMarkdown(value)} />
        </div>
    );
}

export default Markdown;
