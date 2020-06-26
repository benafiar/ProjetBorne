import React from 'react'


const Loading = () => {
  return(
    <div style={{position:"absolute",top:" 50%" , left:" 50% ",textAlign: "center", transform: "translate(-50% ,-50%)" }}>
        <img src={process.env.PUBLIC_URL + `../../images/bk_logo.png`} alt="bk-logo" />
      <h2>Loading...</h2>
    </div>
  )
}

export default Loading