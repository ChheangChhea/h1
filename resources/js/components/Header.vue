<template>
  <div class="container-fuild">
    <div id="header">
      <div id="headTitle">
        <div id="logo">
          <img alt="Healthbook" height="44" src="img/logo.png" width="70" />
        </div>
        <h1 id="title">
          <font style="vertical-align: inherit"
            ><font style="vertical-align: inherit">Patient master</font></font
          >
        </h1>
      </div>
      <ol id="topicPath">
        <li id="tpHome">
          <a href="/">
            <img alt="" height="28" src="img/topicPath_home.png" width="28"
          /></a>
        </li>
        <li>
          <a href="dashbaord"
            ><font style="vertical-align: inherit"
              ><font style="vertical-align: inherit">Master Admin</font></font
            ></a
          >
        </li>
      </ol>
      <div id="headInfo">
        <div id="date-info">
          <span class="icon"></span>
          <p id="todays">
            {{ currentTime.toLocaleDateString() }}
          </p>
        </div>
        <div id="user-info">
          <span class="icon"></span>
          <p id="userName">
            <font style="vertical-align: inherit"
              ><font style="vertical-align: inherit">system </font></font
            ><a href="/login/logout" id="btnlogout" original-title="logout"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">logout</font></font
              ></a
            >
          </p>
        </div>
      </div>
      <!-- / #header -->
    </div>
  </div>
</template>
<script>
import { useCurrentTime } from "../componentJS/date";
export default {
  setup() {
    const { currentTime } = useCurrentTime();
    return { currentTime };
  },
};
</script>
