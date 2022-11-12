import {NextPage} from "next";

/**
 * レイアウトの切り替え
 * 参考: https://imatomix.com/imatomix/notes/1591872503000
 */
export const getServerSideProps = async () => ({

    props: {
        layout: "layout" // 複数のレイアウトを切り替えたいときは 'MainLayout' などの文字列を用いる
    }
})

const test: NextPage = () => {
    return (
        <>signin</>
    )
}

export default test;
